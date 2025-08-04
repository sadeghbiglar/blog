<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

new class extends Component {
    use Toast;
    use WithPagination;

    public string $search = '';
    public bool $drawer = false;
    public int $user_id = 0;
    public array $sortBy = ['column' => 'published_at', 'direction' => 'desc'];
    public function mount(): void
    {
        if (!auth()->user()->hasRole('writer')) {
            $this->error('You are not authorized to access this page.', position: 'toast-bottom');
            redirect()->route('dashboard');
        }
    }
    // Reset pagination when any component property changes
    public function updated($property): void
    {
        if (!is_array($property) && $property != "") {
            $this->resetPage();
        }
    }

    // Clear filters
    public function clear(): void
    {
        $this->reset();
        $this->resetPage();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }
// Delete action
    public function delete($id): void
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $this->success("Post deleted.", position: 'toast-bottom');
    }
    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'title', 'label' => 'Title', 'class' => 'w-64'],
            ['key' => 'user.name', 'label' => 'Author', 'class' => 'hidden lg:table-cell'],
            ['key' => 'published_at', 'label' => 'Published At', 'class' => 'hidden lg:table-cell'],
            ['key' => 'views', 'label' => 'Views', 'class' => 'w-20'],
            ['key' => 'likes', 'label' => 'Likes', 'class' => 'w-20'],
        ];
    }

    // Fetch posts with pagination
    public function posts(): LengthAwarePaginator
    {
        return Post::query()
            ->with('user')
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->when($this->user_id, fn(Builder $q) => $q->where('user_id', $this->user_id))
            ->whereNotNull('published_at') // Only published posts
            ->orderBy(...array_values($this->sortBy))
            ->paginate(5);
    }

    public function with(): array
    {
        return [
            'posts' => $this->posts(),
            'headers' => $this->headers(),
            'users' => User::all(), // For author filter
        ];
    }
}; ?>

<div>
    <!-- HEADER -->
    <x-header title="Blog Posts" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search posts..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
            @auth
                <x-button label="Create Post" link="/posts/create" responsive icon="o-plus" class="btn-primary" />
            @endauth
        </x-slot:actions>
    </x-header>

    <!-- POSTS LIST -->
    <x-card shadow>
        <x-table :headers="$headers" :rows="$posts" :sort-by="$sortBy" with-pagination link="/posts/{id}/edit?title={title}">
@scope('actions', $post)
                @auth
                    <x-button icon="o-trash" wire:click="delete({{ $post->id }})" wire:confirm="Are you sure?" spinner class="btn-ghost btn-sm text-error" />
                @endauth
            @endscope
        </x-table>
    </x-card>

    <!-- FILTER DRAWER -->
    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-input placeholder="Search posts..." wire:model.live.debounce="search" icon="o-magnifying-glass" @keydown.enter="$wire.drawer = false" />
        <x-select placeholder="Author" wire:model.live="user_id" :options="$users" option-value="id" option-label="name" icon="o-user" placeholder-value="0" />

        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-drawer>
</div>