<div class="relative">
    @auth
        <!-- دکمه منوی کاربر لاگین شده -->
        <button onclick="toggleUserMenu()" class="flex items-center space-x-2 rtl:space-x-reverse text-gray-700 hover:text-gray-900 focus:outline-none">
            <img src="{{ auth()->user()->avatar ?? '/empty-user.jpg' }}" alt="Avatar" class="w-8 h-8 rounded-full">
            <span>{{ auth()->user()->name }}</span>
            <svg class="w-4 h-4 transition-transform duration-300" id="user-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <!-- منوی کاربر -->
        <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50 md:w-56 origin-top-right transform scale-y-0 transition-transform duration-300">
            <div class="px-4 py-2 text-sm text-gray-700 opacity-50 cursor-not-allowed">{{ auth()->user()->name }}</div>
            <div class="px-4 py-2 text-sm text-gray-700 opacity-50 cursor-not-allowed">{{ auth()->user()->email }}</div>
            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
            <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
            <a href="/logout" wire:click.prevent="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
        </div>
    @else
        <!-- دکمه منوی کاربر مهمان -->
        <button onclick="toggleGuestMenu()" class="flex items-center space-x-2 rtl:space-x-reverse text-gray-700 hover:text-gray-900 focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span>Guest</span>
            <svg class="w-4 h-4 transition-transform duration-300" id="guest-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <!-- منوی مهمان -->
        <div id="guest-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50 md:w-56 origin-top-right transform scale-y-0 transition-transform duration-300">
            <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a>
            <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a>
        </div>
    @endauth
</div>

<!-- اسکریپت کنترل منو -->
<script>
    function toggleUserMenu() {
        const menu = document.getElementById('user-menu');
        const icon = document.getElementById('user-menu-icon');
        menu.classList.toggle('hidden');
        menu.classList.toggle('scale-y-100');
        icon.classList.toggle('rotate-180');
    }

    function toggleGuestMenu() {
        const menu = document.getElementById('guest-menu');
        const icon = document.getElementById('guest-menu-icon');
        menu.classList.toggle('hidden');
        menu.classList.toggle('scale-y-100');
        icon.classList.toggle('rotate-180');
    }

    // بستن منو هنگام کلیک خارج از آن
    document.addEventListener('click', function(event) {
        const userMenu = document.getElementById('user-menu');
        const guestMenu = document.getElementById('guest-menu');
        const userButton = document.querySelector('button[onclick="toggleUserMenu()"]');
        const guestButton = document.querySelector('button[onclick="toggleGuestMenu()"]');

        if (userMenu && !userMenu.contains(event.target) && userButton && !userButton.contains(event.target)) {
            userMenu.classList.add('hidden');
            userMenu.classList.remove('scale-y-100');
            document.getElementById('user-menu-icon').classList.remove('rotate-180');
        }

        if (guestMenu && !guestMenu.contains(event.target) && guestButton && !guestButton.contains(event.target)) {
            guestMenu.classList.add('hidden');
            guestMenu.classList.remove('scale-y-100');
            document.getElementById('guest-menu-icon').classList.remove('rotate-180');
        }
    });
</script>
