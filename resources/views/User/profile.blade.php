<x-user.header></x-user.header>
<div class="bg-gray-100">
<div class="flex">
    <!-- Sidebar -->
    <div class="w-64 h-screen bg-gray-800 text-white fixed left-0 overflow-y-auto">
        <div class="p-4 text-center">
            <h4 class="text-xl font-semibold">Barbershop</h4>
        </div>
        <x-user.sidebar></x-user.sidebar>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8 w-full">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">My Profile</h2>
            <div class="flex items-center">
                <span class="mr-2">{{ Auth::user()->name }}</span>
                @if($image)
                <img src="{{ asset('storage/' . $image->path) }}" class="rounded-full h-10 w-10" alt="User Profile">
                @else
                <img src="https://via.placeholder.com/40" class="rounded-full h-10 w-10" alt="Default Profile Picture">
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h4 class="card-title mb-4">Profile Picture</h4>
                        @if($image)
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Profile Picture"
                             class="rounded-circle mx-auto d-block mb-4"
                             style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #f8f9fa; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        @else
                        <img src="https://via.placeholder.com/150" alt="Default Profile Picture"
                             class="rounded-circle mx-auto d-block mb-4"
                             style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #f8f9fa; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        @endif

                        <div class="position-relative d-inline-block">
                            <form id="upload-form" action="{{ route('user.upload-image', Auth::id()) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="profile_picture" name="profile_picture" accept="image/*"
                                       class="position-absolute top-0 start-0 opacity-0 w-100 h-100"
                                       style="cursor: pointer; z-index: 2;">

                                <button class="btn btn-primary" type="button" id="upload-button" style="position: relative; z-index: 1;">
                                    <i class="fas fa-upload me-2"></i> Upload New Picture
                                </button>
                            </form>
                        </div>

                        <div class="mt-3">
                            <form action="{{ route('user.remove-image', Auth::id()) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" type="submit">
                                    <i class="fas fa-trash me-1"></i>Remove Picture
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const uploadButton = document.getElementById('upload-button');
                const profileInput = document.getElementById('profile_picture');
                const uploadForm = document.getElementById('upload-form');

                uploadButton.addEventListener('click', () => {
                    profileInput.click(); // Fayl tanlash oynasi ochiladi
                });

                profileInput.addEventListener('change', () => {
                    if (profileInput.files.length > 0) {
                        uploadForm.submit(); // Fayl tanlagandan keyin avtomatik form submit
                    }
                });
            </script>


            <!-- Personal Information Section -->
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Personal Information</h4>
                        <form action="{{ route('user.update-profile') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="fullName" id="fullName" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{  Auth::user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="{{  Auth::user()->phone }}">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Notification Preferences Section -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Notification Preferences</h4>
                        <form>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                                </div>
                                <div class="form-text text-muted">Receive notifications about appointments, promotions, and updates via email.</div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="smsNotifications" checked>
                                    <label class="form-check-label" for="smsNotifications">SMS Notifications</label>
                                </div>
                                <div class="form-text text-muted">Receive notifications about appointments, promotions, and updates via SMS.</div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="appointmentReminders" checked>
                                    <label class="form-check-label" for="appointmentReminders">Appointment Reminders</label>
                                </div>
                                <div class="form-text text-muted">Receive reminders about upcoming appointments.</div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="promotionalEmails">
                                    <label class="form-check-label" for="promotionalEmails">Promotional Emails</label>
                                </div>
                                <div class="form-text text-muted">Receive emails about promotions, discounts, and special offers.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Preferences
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const sidebar = document.querySelector('aside');
        sidebar.classList.toggle('-translate-x-full');
    });
    // Add any additional JavaScript functionality here
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    // Example of a Chart.js chart
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.querySelector('aside').classList.toggle('-translate-x-full');
    });
    // Performance Chart
    const performanceCtx = document.getElementById('performanceChart').getContext('2d');
    new Chart(performanceCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Performance Score',
                data: [85, 88, 87, 90, 89, 92],
                borderColor: 'rgb(59, 130, 246)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
    // Reviews Chart
    const reviewsCtx = document.getElementById('reviewsChart').getContext('2d');
    new Chart(reviewsCtx, {
        type: 'bar',
        data: {
            labels: ['5★', '4★', '3★', '2★', '1★'],
            datasets: [{
                label: 'Customer Reviews',
                data: [45, 30, 15, 5, 5],
                backgroundColor: 'rgba(59, 130, 246, 0.5)',
                borderColor: 'rgb(59, 130, 246)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    // Add any additional JavaScript functionality here
</script>
</div>
<x-user.footer></x-user.footer>

