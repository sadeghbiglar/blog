<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

new 
#[Layout('components.layouts.empty')]
class extends Component
{
    use WithPagination;

    public int $year;

    public function mount($year)
    {
        $this->year = (int) $year;
    }

    public function posts()
    {
        return Post::query()
            ->with('user')
            ->withCount(['likes', 'comments'])
            ->whereYear('published_at', $this->year)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(10);
    }

    public function previousYear(): int
    {
        return $this->year - 1;
    }

    public function nextYear(): int
    {
        return $this->year + 1;
    }

    public function with(): array
    {
        $posts = $this->posts();

        // Related posts برای هر پست
        $relatedPosts = [];
        foreach ($posts as $post) {
            $relatedPosts[$post->id] = Post::query()
                ->whereYear('published_at', $this->year)
                ->where('id', '!=', $post->id)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        }

        return [
            'posts' => $posts,
            'previousYear' => $this->previousYear(),
            'nextYear' => $this->nextYear(),
            'seoTitle' => 'Posts from ' . $this->year,
            'relatedPosts' => $relatedPosts,
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- SEO Title -->
    <title>{{ $seoTitle }}</title>

    <!-- Breadcrumb -->
    <nav class="text-sm mb-4" aria-label="Breadcrumb">
        <ol class="list-reset flex flex-wrap text-gray-500">
            <li><a href="/" class="text-blue-600 hover:underline">Home</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('posts.archive', $year) }}" class="text-blue-600 hover:underline">Archive</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700">{{ $year }}</li>
        </ol>
    </nav>

    <h1 class="text-2xl font-bold mb-4 text-center sm:text-left">{{ $seoTitle }}</h1>

    <!-- Previous / Next Year Buttons -->
    <div class="flex flex-col sm:flex-row justify-between mb-6 gap-2">
        <a href="{{ route('posts.archive', $previousYear) }}" class="bg-gray-200 hover:bg-gray-300 text-center sm:text-left px-4 py-2 rounded-md w-full sm:w-auto">← {{ $previousYear }}</a>
        <a href="{{ route('posts.archive', $nextYear) }}" class="bg-gray-200 hover:bg-gray-300 text-center sm:text-right px-4 py-2 rounded-md w-full sm:w-auto">{{ $nextYear }} →</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- Left Sidebar -->
        <aside class="lg:col-span-1 order-2 lg:order-1">
            <div class="lg:sticky lg:top-20 bg-white shadow rounded-md p-4 mb-6">
                <h3 class="text-lg font-bold mb-4">Archive Navigation</h3>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('posts.archive', $previousYear) }}" class="text-blue-600 hover:underline">← {{ $previousYear }}</a>
                    <a href="{{ route('posts.archive', $year) }}" class="text-gray-700 font-semibold">{{ $year }}</a>
                    <a href="{{ route('posts.archive', $nextYear) }}" class="text-blue-600 hover:underline">{{ $nextYear }} →</a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="lg:col-span-2 order-1 lg:order-2">
            @if($posts->isEmpty())
                <p class="text-gray-500 text-center">No posts found for this year.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($posts as $post)
                        <div class="bg-white shadow rounded-md p-4 flex flex-col">
                            <h2 class="text-xl font-bold mb-2">
                                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">{{ $post->title }}</a>
                            </h2>
                            <p class="text-sm text-gray-500 mb-2">
                                By {{ $post->user->name }} | {{ $post->published_at->format('M d, Y') }}
                            </p>
                            <p class="text-gray-600 mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
                            <p class="text-sm text-gray-500 mt-auto">Views: {{ $post->views }} | Likes: {{ $post->likes_count }} | Comments: {{ $post->comments_count }}</p>

                            <!-- Related Posts -->
                            @if(isset($relatedPosts[$post->id]) && $relatedPosts[$post->id]->isNotEmpty())
                                <div class="mt-4 border-t pt-2">
                                    <h3 class="text-sm font-semibold mb-2 text-gray-700">Related Posts ({{ $year }})</h3>
                                    <ul class="text-sm text-blue-600 flex flex-col gap-1">
                                        @foreach($relatedPosts[$post->id] as $relPost)
                                            <li><a href="{{ route('posts.show', $relPost->id) }}" class="hover:underline">{{ \Illuminate\Support\Str::limit($relPost->title, 40) }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>

        <!-- Right Sidebar -->
        <aside class="lg:col-span-1 order-3">
            <div class="lg:sticky lg:top-20 bg-white shadow rounded-md p-4 mb-6">
                <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                <ul class="flex flex-col gap-2 text-sm text-gray-700">
                    <li><a href="/" class="hover:underline">Home</a></li>
                    <li><a href="{{ route('posts.archive', $previousYear) }}" class="hover:underline">Previous Year</a></li>
                    <li><a href="{{ route('posts.archive', $nextYear) }}" class="hover:underline">Next Year</a></li>
                </ul>
            </div>
        </aside>

    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hidden hover:bg-blue-700 transition">
        ↑ Top
    </button>

</div>

<!-- JavaScript for Back to Top -->
<script>
    const backToTop = document.getElementById('backToTop');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTop.classList.remove('hidden');
        } else {
            backToTop.classList.add('hidden');
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
