<?php

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

new
#[Layout('components.layouts.empty')]
#[Title('')]
class extends Component {
    use WithPagination;

    public $category;

    public function mount(string $category): void
    {
        $this->category = Category::where('slug', $category)->firstOrFail();
    }

    public function title(): string
    {
        return $this->category->name . ' Posts';
    }

    public function posts(): LengthAwarePaginator
    {
        return Post::query()
            ->whereHas('categories', function ($query) {
                $query->where('categories.id', $this->category->id);
            })
            ->with('user')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(10);
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

    <x-card shadow>
        <h1 class="text-2xl font-bold mb-4">{{ $category->name }} Posts</h1>
        <p class="text-sm text-gray-500 mb-4">Explore posts in the {{ $category->name }} category</p>

        <div class="space-y-4">
            @forelse ($posts as $post)
                <div class="bg-gray-100 p-4 rounded">
                    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-500">By {{ $post->user->name }} | {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not Published' }}</p>
                    @if ($post->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($post->image))
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded mb-4" />
                    @else
                        <img src="/default-image.png" alt="Default Image" class="w-full h-48 object-cover rounded mb-4" />
                    @endif
                    <div class="prose max-w-none">{!! \Illuminate\Support\Str::limit(strip_tags($post->content), 150) !!}</div>
                    <div class="mt-4">
                        <x-button label="Read More" link="{{ route('posts.show', $post->id) }}" icon="o-arrow-right" class="btn-primary" />
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No posts found in this category.</p>
            @endforelse

            {{ $posts->links() }}
        </div>
    </x-card>
</div>