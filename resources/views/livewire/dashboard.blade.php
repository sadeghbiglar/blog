<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

new class extends Component {
    use Toast, WithPagination;

    public string $search = '';
    public array $sortBy = ['column' => 'created_at', 'direction' => 'desc'];

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

    // public function deleteUser(User $user): void
    // {
    //     if (auth()->user()->hasRole('admin')) {
    //         $user->delete();
    //         $this->success("$user->name deleted.", position: 'toast-bottom');
    //     } 
        
    //     else {
    //         $this->error('You are not authorized to delete users.', position: 'toast-bottom');
    //     }
    // }

    public function deleteUser(User $user): void
{
    // جلوگیری از حذف خودش
    if ($user->id === auth()->id()) {
        $this->error('You cannot delete your own account.', position: 'toast-bottom');
        return;
    }

    // جلوگیری از حذف ادمین دیگر
    if ($user->hasRole('admin')) {
        $this->error('You cannot delete another admin.', position: 'toast-bottom');
        return;
    }

    $user->delete();
    $this->warning("$user->name deleted", 'Good bye!', position: 'toast-bottom');
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
                : collect([]),
            'users' => auth()->user()->hasRole('admin')
                ? $this->users()
                : collect([]),
            'postHeaders' => $this->postHeaders(),
            'userHeaders' => $this->userHeaders(),
            'stats' => $this->stats(),
        ];
    }
}; ?>

<div>
    <x-header title="Dashboard" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
    </x-header>

    @if (auth()->user()->hasRole('user') && !auth()->user()->hasRole('writer') && !auth()->user()->hasRole('senior_writer') && !auth()->user()->hasRole('admin'))
        <x-card shadow class="mb-6">
            <h2 class="text-xl font-bold">Welcome, {{ auth()->user()->name }}!</h2>
            <p>You are a regular user. Contact an admin to get more permissions.</p>
        </x-card>
    @endif

    @if (auth()->user()->hasRole('writer') || auth()->user()->hasRole('senior_writer') || auth()->user()->hasRole('admin'))
        <x-card shadow class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @if (auth()->user()->hasRole('writer') || auth()->user()->hasRole('senior_writer'))
                    <x-card title="Total Posts" class="text-center">
                        <span class="text-2xl font-bold">{{ $stats['total_posts'] }}</span>
                    </x-card>
                    <x-card title="Total Views" class="text-center">
                        <span class="text-2xl font-bold">{{ $stats['total_views'] }}</span>
                    </x-card>
                    <x-card title="Total Likes" class="text-center">
                        <span class="text-2xl font-bold">{{ $stats['total_likes'] }}</span>
                    </x-card>
                @endif
                @if (auth()->user()->hasRole('admin'))
                    <x-card title="Total Users" class="text-center">
                        <span class="text-2xl font-bold">{{ $stats['total_users'] }}</span>
                    </x-card>
                @endif
            </div>
        </x-card>
    @endif

    @if (auth()->user()->hasRole('writer') || auth()->user()->hasRole('senior_writer'))
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
    @endif

    @if (auth()->user()->hasRole('admin'))
        <x-card shadow>
            <h2 class="text-lg font-bold mb-4">Users</h2>
            <x-table :headers="$userHeaders" :rows="$users" :sort-by="$sortBy" with-pagination link="/users/{id}/edit?name={name}">
                @scope('actions', $user)
                    <x-button icon="o-pencil" link="/users/{{ $user->id }}/edit?name={{ $user->name }}" class="btn-ghost btn-sm" />
                    <x-button icon="o-user" link="/users/{{ $user->id }}/roles" class="btn-ghost btn-sm" />
                    <x-button icon="o-trash" wire:click="deleteUser({{ $user->id }})" wire:confirm="Are you sure?" spinner class="btn-ghost btn-sm text-error" />
                @endscope
            </x-table>
        </x-card>
    @endif
</div>