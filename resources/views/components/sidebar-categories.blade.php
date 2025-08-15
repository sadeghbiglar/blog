@props(['categories'])

<div class="bg-white shadow rounded-md p-4">
    <h3 class="text-lg font-bold mb-4">Categories</h3>
    @foreach ($categories as $category)
        <div class="mb-2">
            <a href="{{ route('categories.show', $category->slug) }}" class="text-blue-600 hover:underline">{{ $category->name }}</a>
        </div>
    @endforeach
</div>
