<x-admin.header></x-admin.header>
<div class="bg-gray-100">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white w-64 flex-shrink-0 hidden md:block">
        <x-admin.sidebar></x-admin.sidebar>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        @if($image)
       <x-admin.navbar :image="$image"></x-admin.navbar>
        @else
        <x-admin.navbar :image="null"></x-admin.navbar>
        @endif

        <!-- Content Area -->
        <main class="flex-1 overflow-y-auto p-4 bg-gray-100">
            <!-- Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-indigo-500 rounded-full p-3">
                            <i class="fas fa-calendar-check text-white"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Today's Appointments</p>
                            <p class="text-2xl font-semibold text-gray-800">{{ $bookingItems }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-full p-3">
                            <i class="fas fa-dollar-sign text-white"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Today's Revenue</p>
                            <p class="text-2xl font-semibold text-gray-800">$345</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-full p-3">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">New Clients</p>
                            <p class="text-2xl font-semibold text-gray-800">3</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-500 rounded-full p-3">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Low Stock Items</p>
                            <p class="text-2xl font-semibold text-gray-800">4</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daily Schedule Section -->
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg font-medium text-gray-900">Today Schedule {{ NOW() }}</h3>
                </div>
                <div class="p-4">
                    <div class="overflow-hidden overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barber</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($bookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->date }} {{ $booking->time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                                                <img src="{{ asset('storage/' . $booking->user->image->path) }}" alt="Client" class="h-full w-full object-cover">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $booking->user->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $booking->user->phone }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $booking->barber->last_name }} {{ $booking->barber->first_name }}</div>
                                                <div class="text-sm text-gray-500">{{ $booking->barber->phone }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->service->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->service->duration }} min</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($booking->status == 'pending')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $booking->status }}</span>
                                        @elseif($booking->status == 'in Progress')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $booking->status }}</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> {{ $booking->status }} </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="{{ route('admin.update-schedule', $booking ->id) }}" class="text-gray-600 hover:text-blue-600 p-2 rounded-full hover:bg-blue-50">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.delete-schedule', $booking->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-gray-600 hover:text-red-600 p-2 rounded-full hover:bg-red-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Previous Haircuts Gallery -->
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg font-medium text-gray-900">Previous Haircuts</h3>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <div class="relative group">
                            <img src="img/haircuts/haircut1.jpg" alt="Haircut 1" class="rounded-lg w-full h-40 object-cover">
                            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-sm rounded-b-lg">Oct 15, 2023</div>
                        </div>
                        <div class="relative group">
                            <img src="img/haircuts/haircut2.jpg" alt="Haircut 2" class="rounded-lg w-full h-40 object-cover">
                            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-sm rounded-b-lg">Sep 30, 2023</div>
                        </div>
                        <div class="relative group">
                            <img src="img/haircuts/haircut3.jpg" alt="Haircut 3" class="rounded-lg w-full h-40 object-cover">
                            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-sm rounded-b-lg">Aug 25, 2023</div>
                        </div>
                        <div class="relative group">
                            <img src="img/haircuts/haircut4.jpg" alt="Haircut 4" class="rounded-lg w-full h-40 object-cover">
                            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-sm rounded-b-lg">Jul 12, 2023</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Special Offers -->
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg font-medium text-gray-900">Special Offers</h3>
                </div>
                <div class="p-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="border-2 border-yellow-500 rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-lg">Holiday Special</h3>
                                    <p class="text-gray-600">20% off on Premium Packages</p>
                                </div>
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded">New</span>
                            </div>
                            <button class="mt-4 text-yellow-500 hover:text-yellow-600">
                                <i class="fas fa-ticket-alt mr-1"></i> Claim Offer
                            </button>
                        </div>
                        <div class="border-2 border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-lg">Loyalty Program</h3>
                                    <p class="text-gray-600">Earn points for every visit!</p>
                                </div>
                                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Ongoing</span>
                            </div>
                            <button class="mt-4 text-gray-500 hover:text-gray-600">
                                <i class="fas fa-info-circle mr-1"></i> Learn More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    // Toggle sidebar for mobile view
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }
    // Add fade-in effect
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('fade-in');
    });
    // Add loading spinner
    const loadingSpinner = document.querySelector('.loading-spinner');
    loadingSpinner.classList.remove('hidden');
    setTimeout(() => {
        loadingSpinner.classList.add('hidden');
    }, 2000); // Simulate loading time
</script>
</div>
<x-admin.footer></x-admin.footer>


