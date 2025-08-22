@props(['post'])

@php
    use Morilog\Jalali\Jalalian;
@endphp

<div class="bg-white shadow rounded-md p-4">
    <div class="flex flex-col md:flex-row gap-4">
        <img src="{{ $post->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($post->image) ? \Illuminate\Support\Facades\Storage::url($post->image) : '/default-image.png' }}" alt="{{ $post->title }}" class="w-full md:w-1/4 h-48 object-cover rounded" />
        <div class="flex-1">
            <h2 class="text-xl font-bold">{{ $post->title }}</h2>
            <p class="text-sm text-gray-500">
                By {{ $post->user->name }} |
                {{ $post->published_at ? Jalalian::fromDateTime($post->published_at)->format('Y/m/d') : 'منتشر نشده' }}
            </p>
            <p class="text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
            <p class="text-sm text-gray-500">
                بازدید: {{ $post->views }} | لایک: {{ $post->likes_count }} | کامنت: {{ $post->comments_count }}
            </p>
            <a href="/posts/{{ $post->id }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">ادامه مطلب</a>
        </div>
    </div>
</div>
