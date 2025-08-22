@props(['archive'])

@php
    use Morilog\Jalali\Jalalian;
@endphp

<div class="bg-white shadow rounded-md p-4">
    <h3 class="text-lg font-bold mb-4">آرشیو</h3>
    @foreach ($archive as $item)
       @php
    $jalaliYear = Jalalian::fromCarbon(\Carbon\Carbon::create($item->year, 12, 31))->getYear();
@endphp

        <div class="mb-2">
            <a href="{{ route('posts.archive', $item->year) }}" class="text-blue-600 hover:underline">
                {{ $jalaliYear }}
            </a>
        </div>
    @endforeach
</div>
