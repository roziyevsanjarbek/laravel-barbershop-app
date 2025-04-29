<x-admin.header></x-admin.header>
<div class="flex">
    <!-- Sidebar - Using Tailwind CSS -->
    <div class="bg-gray-900 text-white w-64 sidebar">
       <x-admin.sidebar></x-admin.sidebar>
    </div>

    <!-- Main Content - Using Bootstrap -->
    <div class="flex-1 bg-light">
        <!-- Top Navigation Bar -->
       <x-admin.navbar :image="$image"></x-admin.navbar>

        <!-- Page Content -->
        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="h3 mb-0">Add New Service</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.manage-services') }}">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Service</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Add Service Form -->
            <form id="addServiceForm" action="{{ route('admin.add-services') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <!-- Service Information Card -->
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="card-title mb-0">Service Information</h5>
                            </div>
                            <div class="card-body">
                                <!-- Service Name -->
                                <div class="mb-3">
                                    <label for="serviceName" class="form-label">Service Name</label>
                                    <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="e.g. Classic Haircut">
                                </div>

                                <div class="row">
                                    <!-- Price -->
                                    <div class="col-md-6 mb-3">
                                        <label for="servicePrice" class="form-label">Price ($)</label>
                                        <input type="number" class="form-control" id="servicePrice" name="servicePrice" placeholder="0.00" step="0.01" min="0">
                                    </div>

                                    <!-- Duration -->
                                    <div class="col-md-6 mb-3">
                                        <label for="serviceDuration" class="form-label">Duration (minutes)</label>
                                        <input type="number" class="form-control" id="serviceDuration" name="serviceDuration" placeholder="30" min="5" step="5">
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="serviceCategory" class="form-label">Category</label>
                                    <select class="form-select" name="serviceCategory" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="serviceDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="4" placeholder="Describe the service..."></textarea>
                                </div>

                                <!-- Active switch -->
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="serviceActive" name="isBooking" checked>
                                    <label class="form-check-label" for="serviceActive">Service is active and available for booking</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service Image Upload -->
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="card-title mb-0">Service Image</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('img/placeholder-service.jpg') }}" alt="Service Preview" class="img-fluid rounded mb-3" id="serviceImagePreview" style="max-height: 200px; width: auto;">
                                <div class="d-grid">
                                    <label for="serviceImage" class="btn btn-outline-primary">
                                        <i class="fas fa-upload me-2"></i> Upload Image
                                    </label>
                                    <input type="file" class="d-none" id="serviceImage" name="serviceImage" accept="image/*">
                                </div>
                                <small class="text-muted">Recommended size: 800x600 pixels</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-end">
                                <a href="{{ route('admin.manage-services') }}" class="btn btn-light me-2">
                                    <i class="fas fa-times me-1"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Save Service
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts -->
<script>
    // Preview uploaded image
    document.getElementById('serviceImage').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('serviceImagePreview').src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<x-admin.footer></x-admin.footer>
