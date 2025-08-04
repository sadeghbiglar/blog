<?php

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
new
#[Layout('components.layouts.app')]
#[Title('Create Post')]
class extends Component {
    use Toast, WithFileUploads;

    #[Rule('required|min:5|max:255')]
    public string $title = '';

    #[Rule('required|min:10')]
    public string $content = '';

    #[Rule('nullable|image|max:2048')]
    public $image = null;

    public bool $published = false;

    public function mount(): void
    {
        if (!auth()->user()->hasRole('writer')) {
            $this->error('You are not authorized to access this page.', position: 'toast-bottom');
            redirect()->route('dashboard');
        }
    }

    public function save(): void
    {
        $validated = $this->validate();

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content'],
            'user_id' => auth()->id(),
            'image' => $this->image ? $this->image->store('posts', 'public') : null,
            'published_at' => $this->published ? now() : null,
            'views' => 0,
            'likes' => 0,
        ]);

        $this->success('Post created successfully.', position: 'toast-bottom');
        redirect()->route('posts.index');
    }
}; ?>

<div class="md:w-3/4 mx-auto mt-10">
    <x-header title="Create New Post" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Back to Posts" link="/posts" icon="o-arrow-left" class="btn-ghost" />
        </x-slot:actions>
    </x-header>

    <x-card shadow>
        <x-form wire:submit="save">
            <x-input label="Title" wire:model="title" placeholder="Enter post title" icon="o-pencil" />
            <x-textarea label="Content" wire:model="content" placeholder="Write your content here..." rows="10" tinymce />
            <x-input label="Image" wire:model="image" type="file" accept="image/*" />
            <x-checkbox label="Publish immediately" wire:model="published" />

            <x-slot:actions>
                <x-button label="Cancel" link="/posts" class="btn-ghost" />
                <x-button label="Save" type="submit" icon="o-check" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>