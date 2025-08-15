@props(['archive'])

<div class="bg-white shadow rounded-md p-4">
    <h3 class="text-lg font-bold mb-4">Archive</h3>
    @foreach ($archive as $year)
        <div class="mb-2">
            <a href="{{ route('posts.archive', $year->year) }}" class="text-blue-600 hover:underline">{{ $year->year }}</a>
        </div>
    @endforeach
</div>
