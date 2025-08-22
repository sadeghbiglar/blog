<?php

use App\Models\Post;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

new
#[Layout('components.layouts.empty')]
#[Title('Home')]
class extends Component {
    use WithPagination;

    public string $search = '';
    public array $sortBy = ['column' => 'published_at', 'direction' => 'desc'];

    // Reset pagination when any component property changes
public function updated($property): void
{
    if (! is_array($property) && $property != "") {
        $this->resetPage();
    }
}
    public function posts(): LengthAwarePaginator
    {
        return Post::query()
            ->with('user')
            ->withCount(['likes', 'comments'])
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->whereNotNull('published_at')
            ->orderBy(...array_values($this->sortBy))
            ->paginate(10);
    }

    public function recentPosts()
    {
        return Post::query()
            ->with('user')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();
    }

    public function archive()
    {
        return Post::query()
            ->whereNotNull('published_at')
            ->selectRaw('YEAR(published_at) as year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();
    }

    public function mostViewedPosts()
    {
        return Post::query()
            ->with('user')
            ->whereNotNull('published_at')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
    }

    public function categories()
    {
        return Category::all();
    }

    public function with(): array
    {
        return [
            'posts' => $this->posts(),
            'recentPosts' => $this->recentPosts(),
            'archive' => $this->archive(),
            'mostViewedPosts' => $this->mostViewedPosts(),
            'categories' => $this->categories(),
        ];
    }

    public function logout()
    {
        auth()->logout();
        $this->redirect('/login', navigate: true);
    }
}; ?>

<div class="min-h-screen bg-gray-100">
    <!-- User Menu -->
    <x-user-menu />

    <!-- Header -->
    <x-site-header title="دفترچه یادداشت های من " subtitle="تجربیات ،یادداشت ها و مطالعات روزانه من اینجا ثبت میشن " />

    <!-- Navbar -->
    <x-navbar />

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            <!-- Left Sidebar -->
            <aside class="lg:col-span-1 space-y-6">
                <x-sidebar-recent-posts :recent-posts="$recentPosts" />
                <x-sidebar-categories :categories="$categories" />
            </aside>

            <!-- Main Content Area -->
            <div class="lg:col-span-2 space-y-4">
                <div class="mb-4 flex justify-end">
                    <input type="text" wire:model.live.debounce="search" placeholder="Search posts..." class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                @foreach ($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach

                {{ $posts->links() }}
            </div>

            <!-- Right Sidebar -->
            <aside class="lg:col-span-1 space-y-6">
                <x-sidebar-archive :archive="$archive" />
                <x-sidebar-most-viewed :most-viewed-posts="$mostViewedPosts" />
            </aside>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />

</div>
