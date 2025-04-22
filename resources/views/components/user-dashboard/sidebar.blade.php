<aside class="fixed inset-y-0 left-0 bg-gray-800 w-64 transform transition-transform duration-300 ease-in-out md:translate-x-0" id="sidebar">
    <div class="flex items-center justify-between p-4 border-b border-gray-700">
        <span class="text-xl text-white font-bold">BarberShop</span>
        <button class="md:hidden text-white" onclick="toggleSidebar()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <nav class="mt-6">
        <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-white hover:bg-gray-700">
            <i class="fas fa-home w-5 mr-3"></i>
            Overview
        </a>
        <a href="{{ route('bookings') }}" class="flex items-center px-6 py-3 text-white bg-gray-700">
            <i class="fas fa-calendar-alt mr-3"></i>
            Bookings
        </a>
        <a href="{{ route('services') }}" class="flex items-center px-6 py-3 text-white bg-gray-700">
            <i class="fas fa-cut mr-3"></i>
            Services
        </a>
        <a href="{{ route('appointments') }}" class="flex items-center px-6 py-3 text-white hover:bg-gray-700">
            <i class="fas fa-calendar-alt w-5 mr-3"></i>
            Appointments
        </a>
        <a href="{{ route('rewards') }}" class="flex items-center px-6 py-3 text-white bg-gray-700">
            <i class="fas fa-star w-5 mr-3"></i>
            Rewards
        </a>
    </nav>
</aside>
