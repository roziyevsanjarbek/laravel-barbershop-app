<x-admin.header></x-admin.header>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <!-- Sidebar Placeholder (Replace with actual sidebar HTML if available) -->
    <div id="sidebar" class="bg-white w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <!-- Add static sidebar content here if available -->
        <x-admin.sidebar></x-admin.sidebar>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Navbar Placeholder (Replace with actual navbar HTML if available) -->
        @if($image)
        <x-admin.navbar :image="$image"></x-admin.navbar>
        @else
        <x-admin.navbar :image="null"></x-admin.navbar>
        @endif

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto p-2 md:p-3 bg-gray-100">
            <div class="w-full mx-auto">
                <!-- Page header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 md:mb-4 px-2">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Manage Services</h1>
                        <p class="mt-1 text-sm text-gray-500">View services offered by your barbershop.</p>
                    </div>
                </div>

                <!-- Services Table -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-2 md:p-3">
                        <div class="overflow-x-auto w-full">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="sticky top-0 z-10 bg-gray-50 py-3 px-3 md:px-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Image</th>
                                    <th scope="col" class="sticky top-0 z-10 bg-gray-50 py-3 px-3 md:px-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Service Name</th>
                                    <th scope="col" class="sticky top-0 z-10 bg-gray-50 py-3 px-3 md:px-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</th>
                                    <th scope="col" class="sticky top-0 z-10 bg-gray-50 py-3 px-3 md:px-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Price</th>
                                    <th scope="col" class="sticky top-0 z-10 bg-gray-50 py-3 px-3 md:px-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Duration</th>
                                    <th scope="col" class="sticky top-0 z-10 bg-gray-50 py-3 px-3 md:px-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                <!-- Static Service 1 -->
                                @foreach($services as $service)
                                    <tr class="hover:bg-gray-100 transition-colors duration-150">
                                        <td class="px-3 md:px-4 py-3 whitespace-nowrap">
                                            @foreach($service->images as $image)
                                            @if($image)
                                                <img src="{{ asset($service->image->path) }}" alt="{{ $image->path }}" class="w-12 h-12 rounded-lg object-cover transform transition-transform duration-200 hover:scale-110">
                                            @else
                                                <img src="https://via.placeholder.com/100" alt="Service" class="w-12 h-12 rounded-lg object-cover transform transition-transform duration-200 hover:scale-110">
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="px-3 md:px-4 py-3 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $service->name }}</div>
                                        </td>
                                        <td class="px-3 md:px-4 py-3">
                                            <div class="text-sm text-gray-500 truncate max-w-xs">{{ $service->description }}</div>
                                        </td>
                                        <td class="px-3 md:px-4 py-3 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $service->price }}$</div>
                                        </td>
                                        <td class="px-3 md:px-4 py-3 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $service->duration }} min</div>
                                        </td>
                                        <td class="px-3 md:px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2 justify-end">
                                                <a href="{{ route('admin.update-services', $service->id) }}" class="text-gray-600 hover:text-blue-600 p-2 rounded-full hover:bg-blue-50">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.delete-services', $service->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-gray-600 hover:text-red-600 p-2 rounded-full hover:bg-red-50">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <div class="flex-shrink-0 bg-white border-t border-gray-200 p-4">
            <div class="flex items-center justify-center space-x-4">
                <span class="text-sm text-gray-500">© 2023 Barbershop. All rights reserved.</span>
                <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Privacy Policy</a>
                <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Terms of Service</a>
                <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Contact Us</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');

        mobileMenuButton.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });
    });
</script>
<x-admin.footer></x-admin.footer>
