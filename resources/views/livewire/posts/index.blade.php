<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Gate;

new class extends Component
{
    use Toast, WithPagination;

    public string $search = '';
    public bool $published = false;
    public array $sortBy = ['column' => 'title', 'direction' => 'asc'];

    public function mount(): void
    {
        if (!Gate::allows('writers')) {
            $this->error('شما اجازه دسترسی به این صفحه را ندارید.', position: 'toast-bottom');
            redirect()->route('dashboard');
        }
    }

    public function updated($property): void
    {
        if (!is_array($property) && $property != "") {
            $this->resetPage();
        }
    }

    public function clear(): void
    {
        $this->reset();
        $this->resetPage();
        $this->success('فیلترها پاک شدند.', position: 'toast-bottom');
    }

    public function delete(Post $post): void
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('senior_writer') || auth()->user()->id === $post->user_id) {
            $post->delete();
            $this->success('پست حذف شد.', position: 'toast-bottom');
        } else {
            $this->error('عملیات غیرمجاز.', position: 'toast-bottom');
        }
    }

    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'title', 'label' => 'عنوان'],
            ['key' => 'user_name', 'label' => 'نویسنده', 'class' => 'hidden lg:table-cell'],
            ['key' => 'published_at', 'label' => 'تاریخ انتشار', 'class' => 'hidden lg:table-cell'],
            ['key' => 'views', 'label' => 'بازدید', 'class' => 'hidden lg:table-cell'],
            ['key' => 'likes_count', 'label' => 'لایک', 'class' => 'hidden lg:table-cell'],
        ];
    }

    public function posts(): LengthAwarePaginator
    {
        $query = Post::query()
            ->with('user')
            ->withCount('likes')
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->when($this->published, fn(Builder $q) => $q->whereNotNull('published_at'));

        if (!auth()->user()->hasRole('admin') && !auth()->user()->hasRole('senior_writer')) {
            $query->where('user_id', auth()->id());
        }

        return $query->orderBy(...array_values($this->sortBy))->paginate(5);
    }

    public function with(): array
    {
        return [
            'posts' => $this->posts(),
            'headers' => $this->headers(),
        ];
    }
};
?>

<div>
    <x-header title="پست‌ها" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="جستجو..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-checkbox label="فقط منتشر شده‌ها" wire:model.live="published" />
            <x-button label="ایجاد پست" link="/posts/create" responsive icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-card shadow>
        <x-table :headers="$headers" :rows="$posts" :sort-by="$sortBy" with-pagination>
            @scope('cell_title', $post)
                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">{{ $post->title }}</a>
            @endscope

            @scope('cell_published_at', $post)
                {{ $post->published_at ? Jalalian::fromCarbon($post->published_at)->format('%d %B %Y') : 'پیش‌نویس' }}
            @endscope

            @scope('cell_likes_count', $post)
                {{ $post->likes_count }}
            @endscope

            @scope('actions', $post)
                @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('senior_writer') || auth()->user()->id === $post->user_id)
                    <x-button icon="o-pencil" link="posts/{{ $post->id }}/edit" class="btn-ghost btn-sm" />
                    <x-button icon="o-trash" wire:click="delete({{ $post->id }})" wire:confirm="آیا مطمئن هستید؟" spinner class="btn-ghost btn-sm text-error" />
                @endif
            @endscope
        </x-table>
    </x-card>
</div>
