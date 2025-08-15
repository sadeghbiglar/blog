@props(['mostViewedPosts'])

<div class="bg-white shadow rounded-md p-4">
    <h3 class="text-lg font-bold mb-4">Most Viewed Posts</h3>
    @foreach ($mostViewedPosts as $post)
        <div class="mb-3">
            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">{{ \Illuminate\Support\Str::limit($post->title, 30) }}</a>
            <p class="text-sm text-gray-500">Views: {{ $post->views }}</p>
        </div>
    @endforeach
</div>
