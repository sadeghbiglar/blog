<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Pagination\LengthAwarePaginator;

new #[Layout('components.layouts.empty')] #[Title('Archive Posts')]
class extends Component
{
    public int $year;

    public function mount($year)
    {
        $this->year = (int) $year;
    }

    public function posts(): LengthAwarePaginator
    {
        return Post::query()
            ->with('user')
            ->withCount(['likes', 'comments'])
            ->whereYear('published_at', $this->year)
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
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold mb-4">Posts from {{ $year }}</h1>

    @if($posts->isEmpty())
        <p class="text-gray-500">No posts found for this year.</p>
    @else
        @foreach ($posts as $post)
            <div class="bg-white shadow rounded-md p-4 mb-4">
                <h2 class="text-xl font-bold">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </h2>
                <p class="text-sm text-gray-500">
                    By {{ $post->user->name }} | {{ $post->published_at->format('M d, Y') }}
                </p>
                <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
                <p class="text-sm text-gray-500">Views: {{ $post->views }} | Likes: {{ $post->likes_count }} | Comments: {{ $post->comments_count }}</p>
            </div>
        @endforeach

        {{ $posts->links() }}
    @endif
</div>
