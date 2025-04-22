<x-admin-dashboard.header></x-admin-dashboard.header>
<div class="bg-gray-100 flex min-h-screen">

<!-- Sidebar -->
    <x-admin-dashboard.sidebar></x-admin-dashboard.sidebar>

    <div class="flex-1">

        <x-admin-dashboard.navbar></x-admin-dashboard.navbar>



<!-- Main Content -->
<div class="flex-1 flex items-center justify-center p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg md:max-w-2xl lg:max-w-3xl">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Add Service</h2>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-4">
            <!-- Service Name -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-gray-600 font-medium">Service Name</label>
                    <input type="text" id="name" name="name" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter service name" required>
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-gray-600 font-medium">Price</label>
                    <input type="number" id="price" name="price" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter price" required>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-600 font-medium">Description</label>
                <textarea id="description" name="description" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Write a short description about the service" required></textarea>
            </div>

            <!-- Image Upload -->
            <div class="flex flex-col md:flex-row items-center md:space-x-4">
                <div class="w-full md:w-2/3">
                    <label for="image" class="block text-gray-600 font-medium">Service Image</label>
                    <input type="file" id="image" name="image" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*" required>
                </div>
                <div class="w-full md:w-1/3 mt-4 md:mt-0">
                    <img id="imagePreview" class="w-full h-32 object-cover border rounded-lg hidden" alt="Preview">
                </div>
            </div>

            <!-- Save Button -->
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition">
                Save
            </button>
        </form>
    </div>
</div>
</div>

<script>
    document.getElementById("image").addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById("imagePreview");
                preview.src = e.target.result;
                preview.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }
    });
</script>

</div>
<x-admin-dashboard.footer></x-admin-dashboard.footer>

