<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Role;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

new class extends Component {
    use Toast, WithPagination;

    public string $search = '';
    public array $sortBy = ['column' => 'created_at', 'direction' => 'desc'];

    // برای دراور انتخاب نقش
    public bool $roleDrawer = false;
    public array $selected_roles = [];
    public int $user_id = 0;

    public function updated($property): void
    {
        if (!is_array($property) && $property != "") {
            $this->resetPage();
        }
    }

    public function deletePost($id): void
    {
        $post = Post::findOrFail($id);
        if (auth()->user()->hasRole('senior_writer') || $post->user_id === auth()->id()) {
            $post->delete();
            $this->success("Post deleted.", position: 'toast-bottom');
        } else {
            $this->error('You are not authorized to delete this post.', position: 'toast-bottom');
        }
    }

   // Delete user
public function delete(User $user): void
{
    try {
        $this->authorize('delete', $user);

        $user->delete();
        $this->warning("$user->name deleted", 'Good bye!', position: 'toast-bottom');
    } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
        $this->error('You are not authorized to delete this user.', position: 'toast-bottom');
    }
}

    // نمایش فرم دراور نقش‌ها
    public function showRoleForm($user_id): void
    {
        $this->user_id = $user_id;
        $user = User::findOrFail($user_id);
        $this->selected_roles = $user->roles->pluck('id')->toArray();
        $this->roleDrawer = true;
    }

    // ذخیره نقش‌ها
    public function saveRoles(): void
    {
        $user = User::findOrFail($this->user_id);
        $user->roles()->sync($this->selected_roles);
        $this->success('Roles updated.', position: 'toast-bottom');
        $this->roleDrawer = false;
    }

    public function postHeaders(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'title', 'label' => 'Title', 'class' => 'w-64'],
            ['key' => 'published_at', 'label' => 'Published At', 'class' => 'hidden lg:table-cell'],
            ['key' => 'views', 'label' => 'Views', 'class' => 'w-20'],
            ['key' => 'likes_count', 'label' => 'Likes', 'class' => 'w-20'],
        ];
    }

    public function userHeaders(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-64'],
            ['key' => 'email', 'label' => 'E-mail', 'sortable' => false],
            ['key' => 'roles', 'label' => 'Roles', 'class' => 'hidden lg:table-cell'],
        ];
    }

    public function posts(): LengthAwarePaginator
    {
        $query = Post::query()->with('user')->withCount('likes');

        if (!auth()->user()->hasRole('senior_writer')) {
            $query->where('user_id', auth()->id());
        }

        return $query
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->orderBy(...array_values($this->sortBy))
            ->paginate(5);
    }

    public function users(): LengthAwarePaginator
    {
        return User::query()
            ->with('roles')
            ->when($this->search, fn(Builder $q) => $q->where('name', 'like', "%$this->search%"))
            ->orderBy(...array_values($this->sortBy))
            ->paginate(5);
    }

    public function stats(): array
    {
        $postIds = auth()->user()->hasRole('senior_writer')
            ? Post::pluck('id')
            : Post::where('user_id', auth()->id())->pluck('id');

        return [
            'total_posts' => auth()->user()->hasRole('senior_writer')
                ? Post::count()
                : Post::where('user_id', auth()->id())->count(),
            'total_views' => auth()->user()->hasRole('senior_writer')
                ? Post::sum('views')
                : Post::where('user_id', auth()->id())->sum('views'),
            'total_likes' => Like::whereIn('post_id', $postIds)->count(),
            'total_users' => User::count(),
        ];
    }

    public function with(): array
    {
        return [
            'posts' => (auth()->user()->hasRole('writer') || auth()->user()->hasRole('senior_writer'))
                ? $this->posts()
                : new LengthAwarePaginator([], 0, 5),
            'users' => (auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
                ? $this->users()
                : new LengthAwarePaginator([], 0, 5),
            'postHeaders' => $this->postHeaders(),
            'userHeaders' => $this->userHeaders(),
            'stats' => $this->stats(),
            // فقط نقش‌های غیر از سوپر ادمین
            'roles' => Role::where('name', '!=', 'super_admin')->get(),
        ];
    }
};
?>

<div>
    <x-header title="Dashboard" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
    </x-header>

@can('regular-user')
        <x-card shadow class="mb-6">
            <h2 class="text-xl font-bold">Welcome, {{ auth()->user()->name }}!</h2>
            <p>You are a regular user. Contact an admin to get more permissions.</p>
        </x-card>
    @endcan

        <x-card shadow class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @can('writers')
                    <x-card title="Total Posts" class="text-center">
                        <span class="text-2xl font-bold">{{ $stats['total_posts'] }}</span>
                    </x-card>
                    <x-card title="Total Views" class="text-center">
                        <span class="text-2xl font-bold">{{ $stats['total_views'] }}</span>
                    </x-card>
                    <x-card title="Total Likes" class="text-center">
                        <span class="text-2xl font-bold">{{ $stats['total_likes'] }}</span>
                    </x-card>
                @endcan
                  @can('admins')
                    <x-card title="Total Users" class="text-center">
                        <span class="text-2xl font-bold">{{ $stats['total_users'] }}</span>
                    </x-card>
                @endcan
            </div>
        </x-card>

      @can('writers')
        <x-card shadow class="mb-6">
            <h2 class="text-lg font-bold mb-4">Your Posts</h2>
            <x-table :headers="$postHeaders" :rows="$posts" :sort-by="$sortBy" with-pagination link="/posts/{id}/edit?title={title}">
                @scope('cell_likes_count', $post)
                    {{ $post->likes_count }}
                @endscope
                @scope('actions', $post)
                    @if (auth()->user()->hasRole('senior_writer') || $post->user_id === auth()->id())
                        <x-button icon="o-pencil" link="/posts/{{ $post->id }}/edit?title={{ $post->title }}" class="btn-ghost btn-sm" />
                        <x-button icon="o-trash" wire:click="deletePost({{ $post->id }})" wire:confirm="Are you sure?" spinner class="btn-ghost btn-sm text-error" />
                    @endif
                @endscope
            </x-table>
        </x-card>
    @endcan

     @can('admins')
        <x-card shadow>
            <h2 class="text-lg font-bold mb-4">Users</h2>
            <x-table :headers="$userHeaders" :rows="$users" :sort-by="$sortBy" with-pagination>
                @scope('cell_roles', $user)
                    <div class="flex gap-2">
                        @foreach ($user->roles as $role)
                            <x-badge :value="$role->name" class="badge-primary badge-soft" />
                        @endforeach
                    </div>
                @endscope
               @scope('actions', $user)
    <x-button icon="o-pencil" link="users/{{ $user->id }}/edit?name={{ $user->name }}" class="btn-ghost btn-sm" />
    <x-button icon="o-user" wire:click="showRoleForm({{ $user->id }})" class="btn-ghost btn-sm" />
    
    @can('delete', $user)
        <x-button 
            icon="o-trash" 
            wire:click="delete({{ $user['id'] }})" 
            wire:confirm="Are you sure?" 
            spinner 
            class="btn-ghost btn-sm text-error" 
        />
    @endcan
@endscope

            </x-table>
        </x-card>
    @endcan

    <!-- ROLE ASSIGNMENT DRAWER -->
    <x-drawer wire:model="roleDrawer" title="Assign Roles" right separator with-close-button class="lg:w-1/3">
        <x-choices
            label="Roles"
            wire:model="selected_roles"
            :options="$roles"
            option-value="id"
            option-label="name"
            icon="o-user"
            hint="Select roles for the user"
            multiple
        />
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.roleDrawer = false" />
            <x-button label="Save" wire:click="saveRoles" class="btn-primary" spinner />
        </x-slot:actions>
    </x-drawer>
</div>
