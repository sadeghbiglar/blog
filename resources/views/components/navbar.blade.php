{{-- resources/views/components/navbar.blade.php --}}
<nav class="bg-gray-800 text-white shadow" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            {{-- لوگو --}}
           

            {{-- دکمه موبایل --}}
            <div class="flex lg:hidden">
                <button @click="mobileOpen = !mobileOpen" class="text-gray-300 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': mobileOpen, 'inline-flex': !mobileOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !mobileOpen, 'inline-flex': mobileOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- منوی دسکتاپ --}}
            <div class="hidden lg:flex space-x-4 rtl">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">خانه</a>

                {{-- زیرمنو آبشاری --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="px-3 py-2 rounded-md text-sm font-medium flex items-center justify-between w-full text-gray-300 hover:bg-gray-700 hover:text-white">
                        درباره ما
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg z-20 rtl">
                        <a href="/about/team" class="block px-4 py-2 text-sm hover:bg-gray-100">تیم ما</a>
                        <a href="/about/history" class="block px-4 py-2 text-sm hover:bg-gray-100">تاریخچه</a>
                        <a href="/about/mission" class="block px-4 py-2 text-sm hover:bg-gray-100">ماموریت ما</a>
                    </div>
                </div>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="px-3 py-2 rounded-md text-sm font-medium flex items-center justify-between w-full text-gray-300 hover:bg-gray-700 hover:text-white">
                        خدمات
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg z-20 rtl">
                        <a href="/services/consulting" class="block px-4 py-2 text-sm hover:bg-gray-100">مشاوره</a>
                        <a href="/services/development" class="block px-4 py-2 text-sm hover:bg-gray-100">توسعه</a>
                        <a href="/services/support" class="block px-4 py-2 text-sm hover:bg-gray-100">پشتیبانی</a>
                    </div>
                </div>

                <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">تماس با ما</a>
            </div>
        </div>
    </div>

    {{-- منوی موبایل --}}
    <div x-show="mobileOpen" @click.away="mobileOpen = false" class="lg:hidden bg-gray-800 rtl">
        <a href="/" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">خانه</a>

        <div x-data="{ open: false }" class="border-t border-gray-700">
            <button @click="open = !open" class="w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white flex justify-between items-center">
                درباره ما
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div x-show="open" class="pl-4 bg-gray-700">
                <a href="/about/team" class="block px-4 py-2 text-sm hover:bg-gray-600">تیم ما</a>
                <a href="/about/history" class="block px-4 py-2 text-sm hover:bg-gray-600">تاریخچه</a>
                <a href="/about/mission" class="block px-4 py-2 text-sm hover:bg-gray-600">ماموریت ما</a>
            </div>
        </div>

        <div x-data="{ open: false }" class="border-t border-gray-700">
            <button @click="open = !open" class="w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white flex justify-between items-center">
                خدمات
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div x-show="open" class="pl-4 bg-gray-700">
                <a href="/services/consulting" class="block px-4 py-2 text-sm hover:bg-gray-600">مشاوره</a>
                <a href="/services/development" class="block px-4 py-2 text-sm hover:bg-gray-600">توسعه</a>
                <a href="/services/support" class="block px-4 py-2 text-sm hover:bg-gray-600">پشتیبانی</a>
            </div>
        </div>

        <a href="/contact" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white border-t border-gray-700">تماس با ما</a>
    </div>
</nav>

{{-- Alpine.js --}}
<script src="//unpkg.com/alpinejs" defer></script>
