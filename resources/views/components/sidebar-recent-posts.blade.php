@props(['recentPosts'])

@php
    use Morilog\Jalali\Jalalian;
@endphp

<div class="bg-white shadow rounded-md p-4">
    <h3 class="text-lg font-bold mb-4">آخرین پست‌ها</h3>
    @foreach ($recentPosts as $post)
        <div class="mb-3">
            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">
                {{ \Illuminate\Support\Str::limit($post->title, 30) }}
            </a>
            <p class="text-sm text-gray-500">
                {{ $post->published_at ? Jalalian::fromDateTime($post->published_at)->format('Y/m/d') : '---' }}
            </p>
        </div>
    @endforeach
</div>
