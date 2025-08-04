<?php

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

new
#[Layout('components.layouts.empty')]
#[Title('Home')]
class extends Component {
    use WithPagination;

    public string $search = '';
    public array $sortBy = ['column' => 'published_at', 'direction' => 'desc'];
  
    // Fetch posts with pagination
    public function posts(): LengthAwarePaginator
    {
        return Post::query()
            ->with('user')
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->whereNotNull('published_at')
            ->orderBy(...array_values($this->sortBy))
            ->paginate(5);
    }

    public function with(): array
    {
        return [
            'posts' => $this->posts(),
        ];
    }
}; ?>

<div class="md:w-3/4 mx-auto mt-10">
    <div class="mb-10">
        <x-app-brand />
    </div>

    <x-header title="Latest Posts" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search posts..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
    </x-header>

    <x-card shadow>
        @foreach ($posts as $post)
            <x-card class="mb-4">
                <div class="flex flex-col md:flex-row gap-4">
                    @if ($post->image)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full md:w-1/4 h-48 object-cover rounded" />
                    @endif
                    <div class="flex-1">
                        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-500">By {{ $post->user->name }} | {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not Published' }}</p>
                        <p class="text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
                        <p class="text-sm text-gray-500">Views: {{ $post->views }} | Likes: {{ $post->likes }}</p>
                        <x-button label="Read More" link="/posts/{{ $post->id }}" class="btn-primary mt-2" />
                    </div>
                </div>
            </x-card>
        @endforeach

        {{ $posts->links() }}
    </x-card>
</div>