<?php

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new
#[Layout('components.layouts.empty')]
#[Title('Post Details')]
class extends Component {
    use Toast;

    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->post->increment('views');
    }

    public function like(): void
    {
        $this->post->increment('likes');
        $this->success('Post liked!', position: 'toast-bottom');
    }
}; ?>

<div class="md:w-3/4 mx-auto mt-10">
    <div class="mb-10">
        <x-app-brand />
    </div>

    <x-card shadow>
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-sm text-gray-500 mb-4">By {{ $post->user->name }} | {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not Published' }}</p>
        @if ($post->image)
            <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded mb-4" />
        @endif
        <div class="prose max-w-none">{!! $post->content !!}</div>
        <p class="text-sm text-gray-500 mt-4">Views: {{ $post->views }} | Likes: {{ $post->likes }}</p>

        <div class="mt-4">
            <x-button label="Like" wire:click="like" icon="o-heart" class="btn-primary" spinner="like" />
            <x-button label="Back to Home" link="/" icon="o-arrow-left" class="btn-ghost" />
        </div>
    </x-card>
</div>