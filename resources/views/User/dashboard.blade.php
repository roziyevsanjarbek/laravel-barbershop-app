<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen overflow-hidden">
    <!-- Sidebar -->
    <div id="sidebar" class="flex flex-col flex-shrink-0 w-64 bg-white p-6 md:p-12">
        <x-user.sidebar></x-user.sidebar>
    </div>

    <!-- Sidebar Overlay for Mobile -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 hidden md:hidden"></div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <button id="menuToggle" class="md:hidden text-gray-700">
                <i class="fas fa-bars text-2xl"></i>
            </button>
            <h1 class="text-xl font-bold text-gray-800">Dashboard</h1>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
            <!-- Welcome Section -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome back, John!</h2>
                <p class="text-gray-600">Here's what's happening with your account today.</p>
            </div>

            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Upcoming Appointment Card -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Upcoming Appointment</h3>
                        <i class="fas fa-calendar text-yellow-500"></i>
                    </div>
                    <div class="space-y-2">
                        <p class="text-gray-700"><span class="font-medium">Date:</span> June 15, 2023</p>
                        <p class="text-gray-700"><span class="font-medium">Time:</span> 2:30 PM</p>
                        <p class="text-gray-700"><span class="font-medium">Service:</span> Haircut & Beard Trim</p>
                        <p class="text-gray-700"><span class="font-medium">Barber:</span> Alex Johnson</p>
                    </div>
                    <a href="{{ route('user.appointments')}}" class="mt-4 inline-block text-sm text-yellow-500 hover:text-yellow-600">View all appointments →</a>
                </div>

                <!-- Recent Activity Card -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                        <i class="fas fa-history text-yellow-500"></i>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <p class="text-gray-700">Appointment completed</p>
                                <p class="text-xs text-gray-500">May 28, 2023</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-calendar-plus text-blue-500 mt-1 mr-2"></i>
                            <div>
                                <p class="text-gray-700">New appointment booked</p>
                                <p class="text-xs text-gray-500">May 20, 2023</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-user-edit text-purple-500 mt-1 mr-2"></i>
                            <div>
                                <p class="text-gray-700">Profile updated</p>
                                <p class="text-xs text-gray-500">May 15, 2023</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Loyalty Points Card -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Loyalty Points</h3>
                        <i class="fas fa-award text-yellow-500"></i>
                    </div>
                    <div class="text-center py-4">
                        <div class="text-4xl font-bold text-yellow-500 mb-2">250</div>
                        <p class="text-gray-600">Current points balance</p>
                    </div>
                    <div class="mt-4 bg-gray-100 rounded-full h-4">
                        <div class="bg-yellow-500 h-4 rounded-full" style="width: 50%"></div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">250 more points until your next free service</p>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('user.bookings')}}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-yellow-50 transition">
                        <i class="fas fa-calendar-plus text-2xl text-yellow-500 mb-2"></i>
                        <span class="text-gray-700 text-sm text-center">Book Appointment</span>
                    </a>
                    <a href="{{ route('user.profile')}}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-yellow-50 transition">
                        <i class="fas fa-user-edit text-2xl text-yellow-500 mb-2"></i>
                        <span class="text-gray-700 text-sm text-center">Update Profile</span>
                    </a>
                    <a href="{{ route('user.appointments')}}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-yellow-50 transition">
                        <i class="fas fa-history text-2xl text-yellow-500 mb-2"></i>
                        <span class="text-gray-700 text-sm text-center">View History</span>
                    </a>
                    <a href="preferences.html" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-yellow-50 transition">
                        <i class="fas fa-bell text-2xl text-yellow-500 mb-2"></i>
                        <span class="text-gray-700 text-sm text-center">Notification Settings</span>
                    </a>
                </div>
            </div>

            <!-- Recommended Services -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Recommended Services</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                        <img src="https://via.placeholder.com/60" alt="Haircut & Styling" class="w-16 h-16 rounded-md object-cover mr-4">
                        <div>
                            <h4 class="font-medium text-gray-800">Premium Beard Grooming</h4>
                            <p class="text-sm text-gray-600 mt-1">Complete beard care package including trim, shaping, and conditioning.</p>
                            <div class="mt-2 flex items-center">
                                <span class="text-yellow-500 font-semibold">$35</span>
                                <span class="mx-2">•</span>
                                <span class="text-gray-500 text-sm">30 min</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                        <img src="https://via.placeholder.com/60" alt="Haircut & Styling" class="w-16 h-16 rounded-md object-cover mr-4">
                        <div>
                            <h4 class="font-medium text-gray-800">Hot Towel Shave</h4>
                            <p class="text-sm text-gray-600 mt-1">Luxurious traditional hot towel shave with essential oils.</p>
                            <div class="mt-2 flex items-center">
                                <span class="text-yellow-500 font-semibold">$40</span>
                                <span class="mx-2">•</span>
                                <span class="text-gray-500 text-sm">45 min</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- JavaScript for Sidebar Toggle -->
<script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        sidebar.classList.toggle('hidden');
        sidebarOverlay.classList.toggle('hidden');
    }

    menuToggle.addEventListener('click', toggleSidebar);
    sidebarOverlay.addEventListener('click', toggleSidebar);
</script>
</body>
</html>
