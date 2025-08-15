<nav class="bg-gray-800 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex space-x-4 h-16 items-center">
            <a href="/" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Home</a>
            <a href="/about" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('about*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">About</a>
            <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Contact</a>
        </div>
    </div>
</nav>
