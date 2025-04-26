<x-admin.header />

<div class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white w-64 flex-shrink-0">
        <x-admin.sidebar />
    </div>

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Modal and Menu JavaScript -->
        <script>
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Modal functions
            function openModal(modalId) {
                document.getElementById(modalId).classList.remove('hidden');
            }

            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }

            // Close modal when clicking outside
            window.addEventListener('click', (e) => {
                const modals = document.querySelectorAll('.fixed.inset-0.bg-gray-500');
                modals.forEach(modal => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            });
        </script>

        <!-- Header Section -->
        <x-admin.navbar :image="$image"></x-admin.navbar>
        <header class="container mx-auto py-12 text-center">

            <h1 class="text-4xl font-bold mb-4">Our Professional Services</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Experience the finest in men's grooming with our comprehensive range of services. Our skilled barbers are here to help you look and feel your best.
            </p>
        </header>

        <!-- Services Container -->
        <div class="container mx-auto px-4 py-8 space-y-16">

            {{-- Haircuts --}}
            <section>
                <h2 class="text-3xl font-bold mb-8 text-gray-800">Haircuts</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach([
                        ['title' => 'Classic Haircut', 'desc' => 'Traditional haircut with expert precision and attention to detail.', 'price' => '$25', 'img' => 'https://images.unsplash.com/photo-1593702295094-aea22597af65'],
                        ['title' => 'Fade Haircut', 'desc' => 'Perfect blend from skin to any length on top.', 'price' => '$30', 'img' => 'https://images.unsplash.com/photo-1599351431202-1e0f0137899a'],
                        ['title' => 'Kids Haircut', 'desc' => 'Gentle and patient service for our younger clients.', 'price' => '$20', 'img' => 'https://images.unsplash.com/photo-1622286342621-4bd786c2447c'],
                    ] as $cut)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <img src="{{ $cut['img'] }}" alt="{{ $cut['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $cut['title'] }}</h3>
                                <p class="text-gray-600 mb-4">{{ $cut['desc'] }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-gray-800">{{ $cut['price'] }}</span>
                                    <button class="bg-gray-900 text-white px-6 py-2 rounded hover:bg-gray-700 transition-colors">Book Now</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Beard Services --}}
            <section>
                <h2 class="text-3xl font-bold mb-8 text-gray-800">Beard Services</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach([
                        ['title' => 'Beard Trim', 'desc' => 'Shape and maintain your beard for a clean, professional look.', 'price' => '$15', 'img' => 'https://images.unsplash.com/photo-1621607512022-6aecc4fed814'],
                        ['title' => 'Luxury Beard Treatment', 'desc' => 'Deep conditioning and styling for the perfect beard.', 'price' => '$25', 'img' => 'https://images.unsplash.com/photo-1621607512419-59a4da85ba9f'],
                        ['title' => 'Clean Shave', 'desc' => 'Traditional straight razor shave with hot towel service.', 'price' => '$20', 'img' => 'https://images.unsplash.com/photo-1621607512552-5aa8e999dcbb'],
                    ] as $beard)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <img src="{{ $beard['img'] }}" alt="{{ $beard['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $beard['title'] }}</h3>
                                <p class="text-gray-600 mb-4">{{ $beard['desc'] }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-gray-800">{{ $beard['price'] }}</span>
                                    <button class="bg-gray-900 text-white px-6 py-2 rounded hover:bg-gray-700 transition-colors">Book Now</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Special Treatments --}}
            <section>
                <h2 class="text-3xl font-bold mb-8 text-gray-800">Special Treatments</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach([
                        ['title' => 'Hair Color', 'desc' => 'Professional coloring to cover gray or try a new look.', 'price' => '$45', 'img' => 'https://images.unsplash.com/photo-1585747860715-2ba37e788b70'],
                        ['title' => 'Scalp Treatment', 'desc' => 'Revitalizing treatment for healthy scalp and hair growth.', 'price' => '$35', 'img' => 'https://images.unsplash.com/photo-1582095133179-bfd08e2fc6b3'],
                        ['title' => 'Face Massage', 'desc' => 'Relaxing facial massage with premium skincare products.', 'price' => '$30', 'img' => 'https://images.unsplash.com/photo-1634302086738-b8705a50d16c'],
                    ] as $treatment)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <img src="{{ $treatment['img'] }}" alt="{{ $treatment['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $treatment['title'] }}</h3>
                                <p class="text-gray-600 mb-4">{{ $treatment['desc'] }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-gray-800">{{ $treatment['price'] }}</span>
                                    <button class="bg-gray-900 text-white px-6 py-2 rounded hover:bg-gray-700 transition-colors">Book Now</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        <!-- Footer -->

    </div>
</div>

<x-admin.footer />
