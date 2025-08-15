<div class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex justify-end">
        @auth
            <div class="relative">
                <button onclick="toggleMenu('user-menu')" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <img src="{{ auth()->user()->avatar ?? '/empty-user.jpg' }}" alt="Avatar" class="w-8 h-8 rounded-full">
                    <span>{{ auth()->user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                    <div class="px-4 py-2 text-sm text-gray-700 opacity-50 cursor-not-allowed">{{ auth()->user()->name }}</div>
                    <div class="px-4 py-2 text-sm text-gray-700 opacity-50 cursor-not-allowed">{{ auth()->user()->email }}</div>
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">Profile</a>
                    <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">Dashboard</a>
                    <a href="/logout" wire:click.prevent="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">Logout</a>
                </div>
            </div>
        @else
            <div class="relative">
                <button onclick="toggleMenu('guest-menu')" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>Guest</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="guest-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                    <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">Login</a>
                    <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">Register</a>
                </div>
            </div>
        @endauth
    </div>
</div>

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

    if (userMenu && !userMenu.contains(event.target) && userButton && !userButton.contains(event.target)) userMenu.classList.add('hidden');
    if (guestMenu && !guestMenu.contains(event.target) && guestButton && !guestButton.contains(event.target)) guestMenu.classList.add('hidden');
});
</script>
