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
    use Toast, WithPagination;

    public string $search = '';
    public bool $drawer = false;
    public int $user_id = 0;
    public array $sortBy = ['column' => 'published_at', 'direction' => 'desc'];

    public function mount(): void
    {
        if (!auth()->user()->hasRole('writer') && !auth()->user()->hasRole('senior_writer')) {
            $this->error('You are not authorized to access this page.', position: 'toast-bottom');
            redirect()->route('dashboard');
        }
    }

    public function updated($property): void
    {
        if (!is_array($property) && $property != "") {
            $this->resetPage();
        }
    }

    public function clear(): void
    {
        $this->reset();
        $this->resetPage();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    public function delete($id): void
    {
        $post = Post::findOrFail($id);
        if (auth()->user()->hasRole('senior_writer') || $post->user_id === auth()->id()) {
            $post->delete();
            $this->success("Post deleted.", position: 'toast-bottom');
        } else {
            $this->error('You are not authorized to delete this post.', position: 'toast-bottom');
        }
    }

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

    public function posts(): LengthAwarePaginator
    {
        $query = Post::query()->with('user');

        if (!auth()->user()->hasRole('senior_writer')) {
            $query->where('user_id', auth()->id());
        }

        return $query
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->when($this->user_id, fn(Builder $q) => $q->where('user_id', $this->user_id))
            ->whereNotNull('published_at')
            ->orderBy(...array_values($this->sortBy))
            ->paginate(5);
    }

    public function with(): array
    {
        return [
            'posts' => $this->posts(),
            'headers' => $this->headers(),
            'users' => User::all(),
        ];
    }
}; ?>

<div>
    <x-header title="Blog Posts" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search posts..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
            <x-button label="Create Post" link="/posts/create" responsive icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-card shadow>
        <x-table :headers="$headers" :rows="$posts" :sort-by="$sortBy" with-pagination link="/posts/{id}/edit?title={title}">
            @scope('actions', $post)
                @if (auth()->user()->hasRole('senior_writer') || $post->user_id === auth()->id())
                    <x-button icon="o-pencil" link="/posts/{{ $post->id }}/edit?title={{ $post->title }}" class="btn-ghost btn-sm" />
                    <x-button icon="o-trash" wire:click="delete({{ $post->id }})" wire:confirm="Are you sure?" spinner class="btn-ghost btn-sm text-error" />
                @endif
            @endscope
        </x-table>
    </x-card>

    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-input placeholder="Search posts..." wire:model.live.debounce="search" icon="o-magnifying-glass" @keydown.enter="$wire.drawer = false" />
        <x-select placeholder="Author" wire:model.live="user_id" :options="$users" option-value="id" option-label="name" icon="o-user" placeholder-value="0" />

        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-drawer>
</div>