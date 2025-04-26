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
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="manage-services.html">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Service</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Add Service Form -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Service Information</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="serviceName" class="form-label">Service Name</label>
                                    <input type="text" class="form-control" id="serviceName" placeholder="e.g. Classic Haircut">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="servicePrice" class="form-label">Price ($)</label>
                                        <input type="number" class="form-control" id="servicePrice" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="serviceDuration" class="form-label">Duration (minutes)</label>
                                        <input type="number" class="form-control" id="serviceDuration" placeholder="30" min="5" step="5">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="serviceCategory" class="form-label">Category</label>
                                    <select class="form-select" id="serviceCategory">
                                        <option selected disabled>Select a category</option>
                                        <option value="haircut">Haircut</option>
                                        <option value="shave">Shave</option>
                                        <option value="beard">Beard Trim</option>
                                        <option value="color">Hair Color</option>
                                        <option value="treatment">Hair Treatment</option>
                                        <option value="package">Package</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="serviceDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="serviceDescription" rows="4" placeholder="Describe the service..."></textarea>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="serviceActive" checked>
                                    <label class="form-check-label" for="serviceActive">Service is active and available for booking</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Service Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/placeholder-service.jpg" alt="Service Preview" class="img-fluid rounded mb-3" id="serviceImagePreview" style="max-height: 200px; width: auto;">
                                <div class="d-grid">
                                    <label for="serviceImage" class="btn btn-outline-primary">
                                        <i class="fas fa-upload me-2"></i> Upload Image
                                    </label>
                                    <input type="file" class="d-none" id="serviceImage" accept="image/*">
                                </div>
                                <small class="text-muted">Recommended size: 800x600 pixels</small>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Additional Options</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="staffAssignment" class="form-label">Assign Staff</label>
                                <select class="form-select" id="staffAssignment" multiple>
                                    <option value="1">John Smith</option>
                                    <option value="2">Michael Johnson</option>
                                    <option value="3">Robert Williams</option>
                                    <option value="4">David Brown</option>
                                </select>
                                <small class="text-muted">Hold Ctrl/Cmd to select multiple staff</small>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="featuredService">
                                <label class="form-check-label" for="featuredService">Feature on homepage</label>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="onlineBooking" checked>
                                <label class="form-check-label" for="onlineBooking">Available for online booking</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <a href="manage-services.html" class="btn btn-light me-2">
                                    <i class="fas fa-times me-1"></i> Cancel
                                </a>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Save Service
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
