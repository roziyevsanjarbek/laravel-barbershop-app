<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview - BarberShop Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 fade-in">
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 bg-gray-800 w-64 transform transition-transform duration-300 ease-in-out md:translate-x-0" id="sidebar">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <span class="text-xl text-white font-bold">BarberShop</span>
            <button class="md:hidden text-white" onclick="toggleSidebar()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="mt-6">
            <a href="dashboard-overview.html" class="flex items-center px-6 py-3 text-white bg-gray-700">
                <i class="fas fa-home w-5 mr-3"></i>
                Overview
            </a>
            <a href="dashboard-appointments.html" class="flex items-center px-6 py-3 text-white hover:bg-gray-700">
                <i class="fas fa-calendar-alt w-5 mr-3"></i>
                Appointments
            </a>
            <a href="dashboard-rewards.html" class="flex items-center px-6 py-3 text-white hover:bg-gray-700">
                <i class="fas fa-star w-5 mr-3"></i>
                Rewards
            </a>
            <a href="dashboard-styles.html" class="flex items-center px-6 py-3 text-white hover:bg-gray-700">
                <i class="fas fa-cut w-5 mr-3"></i>
                My Styles
            </a>
        </nav>
    </aside>

    <!-- Mobile menu button -->
    <button class="fixed top-4 left-4 md:hidden z-50 bg-gray-800 text-white p-2 rounded-lg" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Content -->
    <main class="flex-1 md:ml-64 p-4 md:p-8 overflow-y-auto min-h-screen">
        <div class="loading-spinner hidden">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-yellow-500"></div>
        </div>
        <!-- Welcome Section -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Welcome, <span id="userName">John</span></h1>
            <a href="booking.html" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg inline-flex items-center">
                <i class="fas fa-calendar-plus mr-2"></i> Quick Book
            </a>
        </div>

        <!-- Overview Section -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6">Overview</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Upcoming Appointments -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-calendar-alt text-yellow-500 text-xl mr-2"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Upcoming Appointments</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="border-l-4 border-yellow-500 pl-4">
                            <p class="font-semibold">Haircut & Beard Trim</p>
                            <p class="text-sm text-gray-600">Tomorrow at 2:00 PM</p>
                            <div class="flex mt-2">
                                <button class="text-blue-600 hover:text-blue-800 mr-4">
                                    <i class="fas fa-edit mr-1"></i> Reschedule
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-times mr-1"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Information -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-user text-yellow-500 text-xl mr-2"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Profile Information</h2>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="text-gray-600">Name</label>
                            <p class="font-semibold">John Doe</p>
                        </div>
                        <div>
                            <label class="text-gray-600">Email</label>
                            <p class="font-semibold">john.doe@example.com</p>
                        </div>
                        <div>
                            <label class="text-gray-600">Phone</label>
                            <p class="font-semibold">+1 (555) 123-4567</p>
                        </div>
                        <button class="text-yellow-500 hover:text-yellow-600">
                            <i class="fas fa-pencil-alt mr-1"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('translate-x-0');
        sidebar.classList.toggle('-translate-x-full');
    }
</script>
</body>
</html>

