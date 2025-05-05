<x-admin.header></x-admin.header>
<div class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <x-admin.sidebar></x-admin.sidebar>

        <!-- Main Content -->
        <div class="flex-1">
            @if($image)
            <x-admin.navbar :image="$image"></x-admin.navbar>
            @else
                <x-admin.navbar :image="null"></x-admin.navbar>
            @endif
            <div class="flex-1 p-4 md:p-10">
                <button class="md:hidden text-gray-700 p-2 bg-white rounded-md shadow my-4" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="container">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title mb-4">Barber Management</h1>

                                    <!-- Search and Filter -->
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search barbers..." id="searchInput">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" id="filterSelect">
                                                <option value="all">All Barbers</option>
                                                <option value="recent">Recently Added</option>
                                                <option value="frequent">Frequent Customers</option>
                                                <option value="inactive">Inactive Barbers</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addBarberModal">
                                                <i class="fas fa-plus"></i> Add New
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Barbers List -->
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Barber</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Last Barber</th>
                                                <th>Total Barber</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody id="barbersTable">
                                            @foreach($barbers as $barber)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if($barber->images)
                                                            <img src=" {{ asset($barber->images->path) }}" alt="Barber" class="client-avatar me-3">
                                                        @else
                                                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Barber" class="client-avatar me-3">
                                                        @endif
                                                            <div>
                                                            <h6 class="mb-0">{{ $barber->first_name}} {{ $barber->last_name }}</h6>
                                                            <small class="text-muted">{{ $barber->barber_type }} barber</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $barber->phone }}</td>
                                                <td>{{ $barber->email }}</td>
                                                <td>May 15, 2023</td>
                                                <td><span class="badge bg-success">24</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewBarberModal">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editBarberModal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBarberModal">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Barber Modal -->
        <div class="modal fade" id="addBarberModal" tabindex="-1" aria-labelledby="addBarberModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="addBarberForm" action="{{ route('admin.add-barber') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBarberModalLabel">Add New Barber</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday">
                                </div>
                                <div class="col-md-6">
                                    <label for="barberType" class="form-label">Barber Type</label>
                                    <select class="form-select" id="barberType" name="barberType" required>
                                        <option value="new">New Customer</option>
                                        <option value="regular">Regular Customer</option>
                                        <option value="frequent">Frequent Customer</option>
                                        <option value="vip">VIP Customer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0">Barber Image</h5>
                                        </div>
                                        <div class="card-body text-center">
                                            <img src="{{ asset('img/placeholder-service.jpg') }}" alt="Barber Preview" class="img-fluid rounded mb-3" id="serviceImagePreview" style="max-height: 200px; width: auto;">
                                            <div class="d-grid">
                                                <label for="serviceImage" class="btn btn-outline-primary">
                                                    <i class="fas fa-upload me-2"></i> Upload Image
                                                </label>
                                                <input type="file" class="d-none" id="serviceImage" name="barberImage" accept="image/*" required>
                                            </div>
                                            <small class="text-muted">Recommended size: 800x600 pixels</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Barber</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Edit Barber Modal -->
        <div class="modal fade" id="editBarberModal" tabindex="-1" aria-labelledby="editBarberModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="editBarberForm"
                          action="{{ isset($barber) ? route('admin.update-barber', $barber->id) : '' }}"
                          method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" id="editBarberId" name="id">

                        <div class="modal-header">
                            <h5 class="modal-title" id="editBarberModalLabel">Edit Barber</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="editFirstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="editFirstName" name="firstName"
                                           value="{{ isset($barber) ? $barber->first_name : '' }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="editLastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="editLastName" name="lastName"
                                           value="{{ isset($barber) ? $barber->last_name : ''}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="email"
                                           value="{{ isset($barber) ? $barber->email : '' }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="editPhone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="editPhone" name="phone"
                                           value="{{ isset($barber) ? $barber->phone : '' }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="editAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="editAddress" name="address"
                                           value="{{ isset($barber) ? $barber->address : '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="editBirthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" id="editBirthday" name="birthday"
                                           value="{{ isset($barber) ? $barber->birthday : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="editBarberType" class="form-label">Barber Type</label>
                                    <select class="form-select" id="editBarberType" name="barberType" required>
                                        <option value="new" {{ isset($barber) ? $barber->barber_type === 'new' ? 'selected' : '' : '' }}>New Barber</option>
                                        <option value="regular" {{ isset($barber) ? $barber->barber_type === 'regular' ? 'selected' : '' : '' }}>Regular Barber</option>
                                        <option value="frequent" {{ isset($barber) ? $barber->barber_type === 'frequent' ? 'selected' : '' : '' }}>Frequent Barber</option>
                                        <option value="vip" {{ isset($barber) ? $barber->barber_type === 'vip' ? 'selected' : '' : '' }}>VIP Barber</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0">Barber Image</h5>
                                        </div>
                                        <div class="card-body text-center">
                                            <img src="{{ asset($barber->images->path ?? 'img/placeholder-service.jpg') }}" alt="Barber Preview" class="img-fluid rounded mb-3" id="editBarberImagePreview" style="max-height: 200px; width: auto;">
                                            <div class="d-grid">
                                                <label for="editServiceImage" class="btn btn-outline-primary">
                                                    <i class="fas fa-upload me-2"></i> Upload Image
                                                </label>
                                                <input type="file" class="d-none" id="editServiceImage" name="barberImage" accept="image/*">
                                            </div>
                                            <small class="text-muted">Recommended size: 800x600 pixels</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Barber</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- View Barber Modal -->
        <div class="modal fade" id="viewBarberModal" tabindex="-1" aria-labelledby="viewBarberModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewBarberModalLabel">Barber Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                @if(isset($barber))
                                <img src="{{ asset($barber->images->path) }}" alt="Barber" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                <img src="{{ asset('img/placeholder-service.jpg') }}" alt="Barber Preview" class="img-fluid rounded mb-3" id="barberImagePreview" style="max-height: 200px; width: auto;">
                                @endif
                                <h4 id="barberFullName">{{ isset($barber) ? $barber->first_name : '' }} {{ isset($barber) ? $barber->last_name : '' }}</h4>
                                <span class="badge bg-success" id="barberTypeLabel">{{ isset($barber) ? $barber->barber_type : '' }} barber</span>
                            </div>
                            <div class="col-md-8">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h6>Contact Information</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="fas fa-envelope me-2"></i> <span id="barberEmail">{{ isset($barber) ? $barber->email : '' }}</span></li>
                                            <li class="list-group-item"><i class="fas fa-phone me-2"></i> <span id="barberPhone">{{ isset($barber) ? $barber->phone : '' }}</span></li>
                                            <li class="list-group-item"><i class="fas fa-map-marker-alt me-2"></i> <span id="barberAddress">{{ isset($barber) ? $barber->address : '' }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Customer Info</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="fas fa-calendar-alt me-2"></i> Birthday: <span id="barberBirthday">{{ isset($barber) ? $barber->birthday : '' }}</span></li>
                                            <li class="list-group-item"><i class="fas fa-clipboard-list me-2"></i> Total Barber: <span id="barberVisits">24</span></li>
                                            <li class="list-group-item"><i class="fas fa-clock me-2"></i> Last Barber: <span id="barberLastVisit">May 15, 2023</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBarberModal">Edit Barber</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Barber Modal -->
        <div class="modal fade" id="deleteBarberModal" tabindex="-1" aria-labelledby="deleteBarberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form  method="POST"   action="{{ isset($barber) ? route('admin.delete-barber', $barber->id) : '' }}" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteBarberModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Barber? This action cannot be undone.</p>
                        <input type="hidden" id="deleteBarberId" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Barber</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Bootstrap and jQuery JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            document.getElementById('serviceImage').addEventListener('change', function (event) {
                const preview = document.getElementById('serviceImagePreview');
                const file = event.target.files[0];
                if (file) {
                    preview.src = URL.createObjectURL(file);
                }
            });
        </script>
        <script>
            document.getElementById('editBarberImage').addEventListener('change', function (event) {
                const preview = document.getElementById('editBarberImagePreview');
                const file = event.target.files[0];
                if (file) {
                    preview.src = URL.createObjectURL(file);
                }
            });
        </script>




        {{--        <script>--}}
{{--            // Toggle sidebar on mobile--}}
{{--            document.getElementById('menu-toggle').addEventListener('click', function() {--}}
{{--                const sidebar = document.querySelector('.sidebar');--}}
{{--                sidebar.classList.toggle('-translate-x-full');--}}
{{--            });--}}

{{--            // Search functionality--}}
{{--            document.getElementById('searchInput').addEventListener('keyup', function() {--}}
{{--                const searchValue = this.value.toLowerCase();--}}
{{--                const rows = document.querySelectorAll('#barbersTable tr');--}}

{{--                rows.forEach(row => {--}}
{{--                    const text = row.textContent.toLowerCase();--}}
{{--                    row.style.display = text.includes(searchValue) ? '' : 'none';--}}
{{--                });--}}
{{--            });--}}

{{--            // Filter functionality--}}
{{--            document.getElementById('filterSelect').addEventListener('change', function() {--}}
{{--                const filterValue = this.value;--}}
{{--                const rows = document.querySelectorAll('#barbersTable tr');--}}

{{--                if (filterValue === 'all') {--}}
{{--                    rows.forEach(row => row.style.display = '');--}}
{{--                    return;--}}
{{--                }--}}

{{--                rows.forEach(row => {--}}
{{--                    const barberType = row.querySelector('small.text-muted').textContent.toLowerCase();--}}
{{--                    let shouldShow = false;--}}

{{--                    switch(filterValue) {--}}
{{--                        case 'recent':--}}
{{--                            shouldShow = barberType.includes('new');--}}
{{--                            break;--}}
{{--                        case 'frequent':--}}
{{--                            shouldShow = barberType.includes('frequent');--}}
{{--                            break;--}}
{{--                        case 'inactive':--}}
{{--                            // This would need additional data to determine inactive barbers--}}
{{--                            // For demo purposes, we'll just hide all--}}
{{--                            shouldShow = false;--}}
{{--                            break;--}}
{{--                    }--}}

{{--                    row.style.display = shouldShow ? '' : 'none';--}}
{{--                });--}}
{{--            });--}}

{{--            // Save new barber--}}
{{--            document.getElementById('saveBarberBtn').addEventListener('click', function() {--}}
{{--                const form = document.getElementById('addBarberForm');--}}
{{--                if (form.checkValidity()) {--}}
{{--                    // Here you would normally handle the form submission via AJAX--}}
{{--                    // For demo purposes, we'll just close the modal and show an alert--}}
{{--                    alert('Barber saved successfully!');--}}
{{--                    $('#addBarberModal').modal('hide');--}}
{{--                    form.reset();--}}
{{--                } else {--}}
{{--                    form.reportValidity();--}}
{{--                }--}}
{{--            });--}}

{{--            // Update barber--}}
{{--            document.getElementById('updateBarberBtn').addEventListener('click', function() {--}}
{{--                const form = document.getElementById('editBarberForm');--}}
{{--                if (form.checkValidity()) {--}}
{{--                    // Here you would normally handle the form submission via AJAX--}}
{{--                    alert('Barber updated successfully!');--}}
{{--                    $('#editBarberModal').modal('hide');--}}
{{--                } else {--}}
{{--                    form.reportValidity();--}}
{{--                }--}}
{{--            });--}}

{{--            // Delete barber--}}
{{--            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {--}}
{{--                // Here you would normally handle the deletion via AJAX--}}
{{--                alert('Barber deleted successfully!');--}}
{{--                $('#deleteBarberModal').modal('hide');--}}
{{--            });--}}

{{--            // Populate edit form when edit button is clicked--}}
{{--            document.querySelectorAll('[data-bs-target="#editBarberModal"]').forEach(button => {--}}
{{--                button.addEventListener('click', function() {--}}
{{--                    const row = this.closest('tr');--}}
{{--                    const name = row.querySelector('h6').textContent.split(' ');--}}
{{--                    const firstName = name[0];--}}
{{--                    const lastName = name[1];--}}
{{--                    const email = row.querySelectorAll('td')[2].textContent;--}}
{{--                    const phone = row.querySelectorAll('td')[1].textContent;--}}

{{--                    document.getElementById('editFirstName').value = firstName;--}}
{{--                    document.getElementById('editLastName').value = lastName;--}}
{{--                    document.getElementById('editEmail').value = email;--}}
{{--                    document.getElementById('editPhone').value = phone;--}}
{{--                });--}}
{{--            });--}}

{{--            // Populate view details when view button is clicked--}}
{{--            document.querySelectorAll('[data-bs-target="#viewBarberModal"]').forEach(button => {--}}
{{--                button.addEventListener('click', function() {--}}
{{--                    const row = this.closest('tr');--}}
{{--                    const name = row.querySelector('h6').textContent.split(' ');--}}
{{--                    const firstName = name[0];--}}
{{--                    const lastName = name[1];--}}
{{--                    const email = row.querySelectorAll('td')[2].textContent;--}}
{{--                    const phone = row.querySelectorAll('td')[1].textContent;--}}
{{--                    const address = row.querySelectorAll('td')[3].textContent;--}}
{{--                    const lastVisit = row.querySelectorAll('td')[4].textContent;--}}
{{--                    const visits = row.querySelectorAll('td')[5].textContent;--}}
{{--                    const barberType = row.querySelector('small.text-muted').textContent;--}}
{{--                });--}}
{{--                document.getElementById('barberFullName').textContent = `${firstName} ${lastName}`;--}}
{{--                document.getElementById('barberEmail').textContent = email;--}}
{{--                document.getElementById('barberPhone').textContent = phone;--}}
{{--                document.getElementById('barberAddress').textContent = address;--}}
{{--                document.getElementById('barberLastVisit').textContent = lastVisit;--}}
{{--                document.getElementById('barberVisits').textContent = visits;--}}
{{--                document.getElementById('barberTypeLabel').textContent = barberType;--}}
{{--            });--}}
{{--            // Populate delete confirmation when delete button is clicked--}}
{{--            document.querySelectorAll('[data-bs-target="#deleteBarberModal"]').forEach(button => {--}}
{{--                button.addEventListener('click', function() {--}}
{{--                    const row = this.closest('tr');--}}
{{--                    const barberId = row.querySelector('td').textContent; // Assuming the first cell contains the barber ID--}}
{{--                    document.getElementById('deleteBarberId').value = barberId;--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
    </div>
</div>
<x-admin.footer></x-admin.footer>
