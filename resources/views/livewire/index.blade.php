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
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <div class="flex justify-end">
                @auth
                    <div class="relative">
                        <button onclick="toggleMenu('user-menu')" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <img src="{{ auth()->user()->avatar ?? '/empty-user.jpg' }}" alt="Avatar" class="w-8 h-8 rounded-full">
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                            <div class="px-4 py-2 text-sm text-gray-700 opacity-50 cursor-not-allowed">{{ auth()->user()->name }}</div>
                            <div class="px-4 py-2 text-sm text-gray-700 opacity-50 cursor-not-allowed">{{ auth()->user()->email }}</div>
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> Profile
                            </a>
                            <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg> Dashboard
                            </a>
                            <a href="/logout" wire:click.prevent="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Logout
                            </a>
                        </div>
                    </div>
                @else
                    <div class="relative">
                        <button onclick="toggleMenu('guest-menu')" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>Guest</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="guest-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                            <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg> Login
                            </a>
                            <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg> Register
                            </a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <h1 class="text-3xl font-bold">Welcome to Our Blog</h1>
            <p class="mt-2">Discover the latest posts and insights</p>
        </div>
    </header>

    <!-- Navbar -->
    <nav class="bg-gray-800 text-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-4 h-16 items-center">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Home</a>
                <div class="relative group">
                    <a href="/about" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('about*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">About</a>
                    <div class="hidden group-hover:block absolute left-0 mt-0 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                        <a href="/about/team" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Team</a>
                        <a href="/about/history" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">History</a>
                    </div>
                </div>
                <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Left Sidebar -->
            <aside class="lg:col-span-1">
                <!-- Recent Posts -->
                <div class="bg-white shadow rounded-md p-4 mb-6">
                    <h3 class="text-lg font-bold mb-4">Recent Posts</h3>
                    @foreach ($recentPosts as $post)
                        <div class="mb-3">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">{{ \Illuminate\Support\Str::limit($post->title, 30) }}</a>
                            <p class="text-sm text-gray-500">{{ $post->published_at->format('M d, Y') }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Categories -->
                <div class="bg-white shadow rounded-md p-4">
                    <h3 class="text-lg font-bold mb-4">Categories</h3>
                    @foreach ($categories as $category)
                        <div class="mb-2">
                            <a href="{{ route('categories.show', $category->slug) }}" class="text-blue-600 hover:underline">{{ $category->name }}</a>
                        </div>
                    @endforeach
                </div>
            </aside>

            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="mb-4">
                    <div class="flex justify-end">
                        <input type="text" wire:model.live.debounce="search" placeholder="Search posts..." class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="space-y-4">
                    @foreach ($posts as $post)
                        <div class="bg-white shadow rounded-md p-4">
                            <div class="flex flex-col md:flex-row gap-4">
                                <img src="{{ $post->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($post->image) ? \Illuminate\Support\Facades\Storage::url($post->image) : '/default-image.png' }}" alt="{{ $post->title }}" class="w-full md:w-1/4 h-48 object-cover rounded" />
                                <div class="flex-1">
                                    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                                    <p class="text-sm text-gray-500">By {{ $post->user->name }} | {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not Published' }}</p>
                                    <p class="text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
                                    <p class="text-sm text-gray-500">Views: {{ $post->views }} | Likes: {{ $post->likes_count }} | Comments: {{ $post->comments_count }}</p>
                                    <a href="/posts/{{ $post->id }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $posts->links() }}
                </div>
            </div>

            <!-- Right Sidebar -->
            <aside class="lg:col-span-1">
                <!-- Archive -->
                <div class="bg-white shadow rounded-md p-4 mb-6">
                    <h3 class="text-lg font-bold mb-4">Archive</h3>
                    @foreach ($archive as $year)
                        <div class="mb-2">
                            <a href="{{ route('posts.index', ['year' => $year->year]) }}" class="text-blue-600 hover:underline">{{ $year->year }}</a>
                        </div>
                    @endforeach
                </div>

                <!-- Most Viewed Posts -->
                <div class="bg-white shadow rounded-md p-4">
                    <h3 class="text-lg font-bold mb-4">Most Viewed Posts</h3>
                    @foreach ($mostViewedPosts as $post)
                        <div class="mb-3">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">{{ \Illuminate\Support\Str::limit($post->title, 30) }}</a>
                            <p class="text-sm text-gray-500">Views: {{ $post->views }}</p>
                        </div>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <h3 class="text-lg font-bold">Our Blog</h3>
                    <p class="text-sm">Stay updated with the latest posts and insights.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Links</h3>
                    <ul class="text-sm">
                        <li><a href="/about" class="hover:underline">About</a></li>
                        <li><a href="/contact" class="hover:underline">Contact</a></li>
                        <li><a href="/privacy" class="hover:underline">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Contact</h3>
                    <p class="text-sm">Email: info@ourblog.com</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Menu Toggle -->
    <script>
        function toggleMenu(menuId) {
            const menu = document.getElementById(menuId);
            menu.classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            const guestMenu = document.getElementById('guest-menu');
            const userButton = document.querySelector('button[onclick="toggleMenu(\'user-menu\')"]');
            const guestButton = document.querySelector('button[onclick="toggleMenu(\'guest-menu\')"]');

            if (userMenu && !userMenu.contains(event.target) && userButton && !userButton.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
            if (guestMenu && !guestMenu.contains(event.target) && guestButton && !guestButton.contains(event.target)) {
                guestMenu.classList.add('hidden');
            }
        });
    </script>
</div>