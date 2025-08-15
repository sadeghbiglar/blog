<?php

use App\Models\Post;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

new
#[Layout('components.layouts.empty')]
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

    // دسته‌هایی که کاربر انتخاب می‌کند
    #[Rule('nullable|array')]
    public array $selectedCategories = [];

    // گزینه‌های موجود برای انتخاب
    public array $categoryOptions = [];

    public function mount(): void
    {
        if (!auth()->user()->hasRole('writer')) {
            $this->error('You are not authorized to access this page.', position: 'toast-bottom');
            redirect()->route('dashboard');
        }

        $this->categoryOptions = Category::all()->map(function ($category) {
            return ['id' => (string) $category->id, 'name' => $category->name];
        })->toArray();

        if (empty($this->categoryOptions)) {
            $this->categoryOptions = [
                ['id' => '1', 'name' => 'Test Category 1'],
                ['id' => '2', 'name' => 'Test Category 2'],
                ['id' => '3', 'name' => 'Test Category 3'],
            ];
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

        if (!empty($validated['selectedCategories'])) {
            $post->categories()->sync($validated['selectedCategories']);
        }

        $this->success('Post created successfully.', position: 'toast-bottom');
        redirect()->route('posts.index');
    }

    public function with(): array
    {
        return [
            'categoryOptions' => $this->categoryOptions,
        ];
    }
}; 
?>

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
            
            <x-choices
                label="Categories"
                wire:model="selectedCategories"
                :options="$categoryOptions"
                option-value="id"
                option-label="name"
                multiple
                placeholder="Select categories"
                hint="Select categories for the post"
            />

            <x-checkbox label="Publish immediately" wire:model="published" />

            <x-slot:actions>
                <x-button label="Cancel" link="/posts" class="btn-ghost" />
                <x-button label="Save" type="submit" icon="o-check" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
