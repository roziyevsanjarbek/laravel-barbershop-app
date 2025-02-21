<nav class="bg-gray-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="index.html" class="text-2xl font-bold">BarberShop</a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-6">
            <a href="{{ route('dashboard') }}" class="hover:text-gray-300">Dashboard</a>
            <a href="{{ route('services') }}" class="hover:text-gray-300">Services</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('bookings') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Book Now</a>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mt-2">
        <a href="index.html" class="block py-2 px-4 text-sm hover:bg-gray-700">Home</a>
        <a href="services.html" class="block py-2 px-4 text-sm hover:bg-gray-700">Services</a>
        <button onclick="openModal('loginModal')" class="block w-full text-left py-2 px-4 text-sm hover:bg-gray-700">Login</button>
        <button onclick="openModal('registerModal')" class="block w-full text-left py-2 px-4 text-sm hover:bg-gray-700">Register</button>
        <a href="booking.html" class="block py-2 px-4 text-sm bg-gray-700">Book Now</a>
    </div>
</nav>
