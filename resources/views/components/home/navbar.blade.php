<nav class="fixed top-0 w-full bg-gray-800 shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-white">Elegant Cuts</a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-white hover:text-indigo-300">Home</a>
                <a href="{{ route('about') }}" class="text-white hover:text-indigo-300">About</a>
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-indigo-300">Login</a>
                <a href="{{ route('register') }}" class="text-gray-300 hover:text-indigo-300">Register</a>
            </div>

            <!-- Book Now Button -->


            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-300 hover:text-white" id="mobile-menu-button">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="index.html" class="block text-white bg-gray-700 px-3 py-2 rounded-md">Home</a>
                <a href="services.html" class="block text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md">Services</a>
                <a href="booking.html" onclick="checkAuth(event)" class="block bg-indigo-500 text-white px-3 py-2 rounded-md font-semibold hover:bg-indigo-600">Book Now</a>
                <a href="login.html" class="block text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md">Login</a>
                <a href="register.html" class="block text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md">Register</a>
            </div>
        </div>
    </div>
</nav>
