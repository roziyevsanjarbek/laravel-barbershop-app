<aside class="fixed inset-y-0 left-0 bg-gray-800 w-64 transform transition-transform duration-300 ease-in-out md:translate-x-0" id="sidebar">
    <div class="flex items-center justify-between p-4 border-b border-gray-700">
        <span class="text-xl text-white font-bold">BarberShop</span>
        <button class="md:hidden text-white" onclick="toggleSidebar()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <nav class="mt-6">
        <a href="{{ route('user.dashboard') }}"
           class="flex items-center px-4 py-3 {{ Route::is('user.dashboard') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-white' }}">
            <i class="fas fa-home w-5 mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('user.services') }}"
           class="block py-2.5 px-4 rounded transition duration-200 {{ Route::is('user.services') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-white' }} ">
            <i class="fas fa-cut mr-3"></i>Service
        </a>
        <a href="{{ route('user.appointments') }}"
           class="flex items-center px-4 py-3 {{ Route::is('user.appointments') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-white' }}">
            <i class="fas fa-calendar-alt w-5 mr-3"></i>
            Appointments
        </a>
        <a href="{{ route('user.rewards') }}"
           class="flex items-center px-4 py-3 {{ Route::is('user.rewards') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-white' }}">
            <i class="fas fa-star w-5 mr-3"></i>
            Rewards
        </a>
        <a href="{{ route('user.profile') }}"
           class="block py-2.5 px-4 rounded transition duration-200 {{ Route::is('user.profile') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 text-white' }} ">
            <i class="fas fa-user mr-2"></i>Profile
        </a>
        <a href="/dashboard" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700 rounded mb-1">
            <i class="fas fa-sign-out-alt mr-3"></i> Logout
        </a>
    </nav>
</aside>
