<?php

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
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
    public string $content = '';

    public function mount(Post $post): void
    {
        $this->post = $post->load('comments.user', 'likes');
        $this->post->increment('views');
    }

    public function toggleLike(): void
    {
        $userId = auth()->id();
        if ($this->post->likedByUser($userId)) {
            // Unlike
            $this->post->likes()->where('user_id', $userId)->delete();
            $this->success('Post unliked!', position: 'toast-bottom');
        } else {
            // Like
            Like::create([
                'user_id' => $userId,
                'post_id' => $this->post->id,
            ]);
            $this->success('Post liked!', position: 'toast-bottom');
        }
        $this->post->refresh();
    }

    public function saveComment(): void
    {
        $this->validate([
            'content' => 'required|string|min:3|max:500',
        ]);

        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        $this->content = '';
        $this->post->refresh();
        $this->success('Comment added successfully.', position: 'toast-bottom');
    }

    public function deleteComment($commentId): void
    {
        $comment = Comment::findOrFail($commentId);
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('senior_writer') || auth()->user()->id === $comment->user_id) {
            $comment->delete();
            $this->post->refresh();
            $this->success('Comment deleted successfully.', position: 'toast-bottom');
        } else {
            $this->error('Unauthorized action.', position: 'toast-bottom');
        }
    }
}; ?>

<div class="md:w-3/4 mx-auto mt-10">
    <div class="mb-10">
        <x-app-brand />
    </div>

    <x-card shadow>
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-sm text-gray-500 mb-4">By {{ $post->user->name }} | {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not Published' }}</p>
       
           <img src="{{ $post->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($post->image) ? \Illuminate\Support\Facades\Storage::url($post->image) : '/default-image.png' }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded mb-4" />
      
        <div class="prose max-w-none">{!! $post->content !!}</div>
        <p class="text-sm text-gray-500 mt-4">Views: {{ $post->views }} | Likes: {{ $post->likes->count() }}</p>

        <div class="mt-4">
            <x-button label="{{ $post->likedByUser(auth()->id()) ? 'Unlike' : 'Like' }}" wire:click="toggleLike" icon="o-heart" class="btn-primary" spinner="toggleLike" />
            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('senior_writer') || auth()->user()->id === $post->user_id)
                <x-button label="Edit Post" link="/posts/{{ $post->id }}/edit" icon="o-pencil" class="btn-primary" />
            @endif
            <x-button label="Back to Home" link="/" icon="o-arrow-left" class="btn-ghost" />
        </div>

        <h3 class="mt-8 text-lg font-bold">Comments</h3>
        @if ($post->comments->isEmpty())
            <p class="text-gray-500 mt-2">No comments yet.</p>
        @else
            @foreach ($post->comments as $comment)
                <div class="mt-4 p-4 bg-gray-100 rounded">
                    <p class="text-sm"><strong>{{ $comment->user->name }}</strong> on {{ $comment->created_at->format('M d, Y H:i') }}</p>
                    <p>{{ $comment->content }}</p>
                    @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('senior_writer') || auth()->user()->id === $comment->user_id)
                        <x-button label="Delete" wire:click="deleteComment({{ $comment->id }})" icon="o-trash" class="btn-ghost btn-sm text-error" wire:confirm="Are you sure?" />
                    @endif
                </div>
            @endforeach
        @endif

        @auth
            <div class="mt-6">
                <x-form>
                    <x-textarea label="Add a Comment" wire:model="content" placeholder="Write your comment..." rows="4" />
                    <x-button label="Submit Comment" wire:click="saveComment" icon="o-paper-airplane" class="btn-primary mt-2" spinner />
                </x-form>
            </div>
        @endauth
    </x-card>
</div>