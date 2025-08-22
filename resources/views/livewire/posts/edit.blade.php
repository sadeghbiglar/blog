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
#[Title('ویرایش پست')]
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

    #[Rule('nullable|array')]
    public array $selectedCategories = [];

    public array $categoryOptions = [];

    public function mount(Post $post): void
    {
        if (!Gate::allows('writers')) {
            $this->error('شما اجازه دسترسی به این صفحه را ندارید.', position: 'toast-bottom');
            redirect()->route('dashboard');
        }

        $this->post = $post;

        // پر کردن فیلدها از پست
        $this->title = $post->title;
        $this->content = $post->content;
        $this->published = !is_null($post->published_at);

        // همه دسته‌ها برای انتخاب
        $this->categoryOptions = Category::all()->map(function ($category) {
            return ['id' => (string) $category->id, 'name' => $category->name];
        })->toArray();

        if (empty($this->categoryOptions)) {
            $this->categoryOptions = [
                ['id' => '1', 'name' => 'دسته تست ۱'],
                ['id' => '2', 'name' => 'دسته تست ۲'],
                ['id' => '3', 'name' => 'دسته تست ۳'],
            ];
        }

        // دسته‌های انتخاب شده برای این پست
        $this->selectedCategories = $post->categories->pluck('id')->map(fn($id) => (string) $id)->toArray();
    }

    public function update(): void
    {
        $validated = $this->validate();

        $this->post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content'],
            'image' => $this->image ? $this->image->store('posts', 'public') : $this->post->image,
            'published_at' => $this->published ? now() : null,
        ]);

        if (!empty($validated['selectedCategories'])) {
            $this->post->categories()->sync($validated['selectedCategories']);
        } else {
            $this->post->categories()->detach();
        }

        $this->success('پست با موفقیت بروزرسانی شد.', position: 'toast-bottom');
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
    <x-header title="ویرایش پست" separator progress-indicator>
        <x-slot:actions>
            <x-button label="بازگشت به پست‌ها" link="/posts" icon="o-arrow-left" class="btn-ghost" />
        </x-slot:actions>
    </x-header>

    <x-card shadow>
        <x-form wire:submit="update">
            <x-input label="عنوان" wire:model="title" placeholder="عنوان پست را وارد کنید" icon="o-pencil" />
            <x-textarea label="محتوا" wire:model="content" placeholder="محتوای خود را اینجا بنویسید..." rows="10" tinymce />

            <x-input label="تصویر" wire:model="image" type="file" accept="image/*" />

            <x-choices
                label="دسته‌بندی‌ها"
                wire:model="selectedCategories"
                :options="$categoryOptions"
                option-value="id"
                option-label="name"
                multiple
                placeholder="دسته‌ها را انتخاب کنید"
                hint="دسته‌بندی‌های مربوط به پست را انتخاب کنید"
            />

            <x-checkbox label="انتشار فوری" wire:model="published" />

            <x-slot:actions>
                <x-button label="لغو" link="/posts" class="btn-ghost" />
                <x-button label="بروزرسانی" type="submit" icon="o-check" class="btn-primary" spinner="update" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
