<?php

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Illuminate\Support\Str;

new
#[Layout('components.layouts.app')]
#[Title('Edit Post')]
class extends Component {
    use Toast, WithFileUploads;

    public Post $post;

    #[Rule('required|min:5|max:255')]
    public string $title = '';

    #[Rule('required|min:10')]
    public string $content = '';

    #[Rule('nullable|image|max:2048')]
    public $image = null;

    public bool $published = false;

    public function mount(Post $post): void
    {
        if (!auth()->user()->hasRole('senior_writer') && (!auth()->user()->hasRole('writer') || $post->user_id !== auth()->id())) {
            $this->error('You are not authorized to edit this post.', position: 'toast-bottom');
            redirect()->route('dashboard');
        }

        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->published = !is_null($post->published_at);
    }

    public function save(): void
    {
        $validated = $this->validate();

        $this->post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content'],
            'image' => $this->image ? $this->image->store('posts', 'public') : $this->post->image,
            'published_at' => $this->published ? now() : null,
        ]);

        $this->success('Post updated successfully.', position: 'toast-bottom');
        redirect()->route('posts.index');
    }
}; ?>

<div class="md:w-3/4 mx-auto mt-10">
    <x-header title="Edit Post" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Back to Posts" link="/posts" icon="o-arrow-left" class="btn-ghost" />
        </x-slot:actions>
    </x-header>

    <x-card shadow>
        <x-form wire:submit="save">
            <x-input label="Title" wire:model="title" placeholder="Enter post title" icon="o-pencil" />
            <x-textarea label="Content" wire:model="content" placeholder="Write your content here..." rows="10" tinymce />
            <x-input label="Image" wire:model="image" type="file" accept="image/*" />
            @if ($post->image)
                <div class="mt-2">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded" />
                </div>
            @endif
            <x-checkbox label="Publish immediately" wire:model="published" />

            <x-slot:actions>
                <x-button label="Cancel" link="/posts" class="btn-ghost" />
                <x-button label="Save" type="submit" icon="o-check" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>