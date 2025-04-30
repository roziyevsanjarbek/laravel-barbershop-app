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
            @foreach($categories as $category)
            <section>
                <h2 class="text-3xl font-bold mb-8 text-gray-800">{{ $category->name }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            @foreach($service->images as $image)
                            <img src="{{ asset($service->image->path) }}" alt="{{ $service->name }}" class="w-full h-48 object-cover">
                            @endforeach
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $service->name  }}</h3>
                                <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-gray-800">{{ $service->price }}</span>
                                    <button class="bg-gray-900 text-white px-6 py-2 rounded hover:bg-gray-700 transition-colors">Book Now</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            @endforeach
        </div>
    </div>
</div>

<x-admin.footer />
