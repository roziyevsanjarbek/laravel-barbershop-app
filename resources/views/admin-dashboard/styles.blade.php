<x-admin-dashboard.header></x-admin-dashboard.header>
<div class="bg-gray-100">
<div class="flex h-screen">
    <!-- Sidebar -->

    <x-admin-dashboard.sidebar></x-admin-dashboard.sidebar>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8">
        <section id="styles" class="mb-12">
            <h2 class="text-2xl font-bold mb-6">My Styles</h2>
            <!-- Style Recommendations -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fas fa-cut text-yellow-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Style Recommendations</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="border rounded-lg p-4">
                        <img src="https://via.placeholder.com/300x200/f3f4f6/000000?text=Modern+Fade" alt="Fade Cut" class="rounded-lg mb-2 w-full">
                        <h3 class="font-semibold">Modern Fade</h3>
                        <p class="text-sm text-gray-600">Based on your previous styles</p>
                    </div>
                    <div class="border rounded-lg p-4">
                        <img src="https://via.placeholder.com/300x200/f3f4f6/000000?text=Textured+Crop" alt="Textured Cut" class="rounded-lg mb-2 w-full">
                        <h3 class="font-semibold">Textured Crop</h3>
                        <p class="text-sm text-gray-600">Trending style for your face shape</p>
                    </div>
                </div>
            </div>

            <!-- Previous Haircuts Gallery -->
            <div class="bg-white p-6 rounded-lg shadow-md md:col-span-2">
                <div class="flex items-center mb-4">
                    <i class="fas fa-images text-yellow-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Your Haircut Gallery</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div class="relative group">
                        <img src="https://via.placeholder.com/300x300/f3f4f6/000000?text=Haircut+1" alt="Previous Haircut" class="rounded-lg w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-sm rounded-b-lg">
                            Oct 15, 2023
                        </div>
                    </div>
                    <div class="relative group">
                        <img src="https://via.placeholder.com/300x300/f3f4f6/000000?text=Haircut+2" alt="Previous Haircut" class="rounded-lg w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-sm rounded-b-lg">
                            Sep 30, 2023
                        </div>
                    </div>
                    <div class="relative group">
                        <img src="https://via.placeholder.com/300x300/f3f4f6/000000?text=Haircut+3" alt="Previous Haircut" class="rounded-lg w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-sm rounded-b-lg">
                            Aug 25, 2023
                        </div>
                    </div>
                    <div class="relative group">
                        <img src="https://via.placeholder.com/300x300/f3f4f6/000000?text=Haircut+4" alt="Previous Haircut" class="rounded-lg w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-sm rounded-b-lg">
                            Jul 12, 2023
                        </div>
                    </div>
                </div>
            </div>

            <!-- Special Offers -->
            <div class="bg-white p-6 rounded-lg shadow-md md:col-span-2">
                <div class="flex items-center mb-4">
                    <i class="fas fa-percentage text-yellow-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Special Offers</h2>
                </div>
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
                                <h3 class="font-bold text-lg">Refer a Friend</h3>
                                <p class="text-gray-600">Get $10 off your next visit</p>
                            </div>
                        </div>
                        <button class="mt-4 text-yellow-500 hover:text-yellow-600">
                            <i class="fas fa-share mr-1"></i> Share Now
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
        sidebar.classList.toggle('-translate-x-full');
    }
</script>
</div>
<x-admin-dashboard.footer></x-admin-dashboard.footer>

