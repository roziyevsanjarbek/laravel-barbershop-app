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
                            <h1 class="card-title mb-4">Client Management</h1>

                            <!-- Search and Filter -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search clients..." id="searchInput">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" id="filterSelect">
                                        <option value="all">All Clients</option>
                                        <option value="recent">Recently Added</option>
                                        <option value="frequent">Frequent Customers</option>
                                        <option value="inactive">Inactive Clients</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addClientModal">
                                        <i class="fas fa-plus"></i> Add New
                                    </button>
                                </div>
                            </div>

                            <!-- Clients List -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Last Visit</th>
                                        <th>Total Visits</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="clientsTable">
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="client-avatar me-3">
                                                <div>
                                                    <h6 class="mb-0">John Smith</h6>
                                                    <small class="text-muted">Regular Customer</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>(555) 123-4567</td>
                                        <td>john.smith@example.com</td>
                                        <td>May 15, 2023</td>
                                        <td><span class="badge bg-success">24</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewClientModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editClientModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClientModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="client-avatar me-3">
                                                <div>
                                                    <h6 class="mb-0">Maria Johnson</h6>
                                                    <small class="text-muted">New Customer</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>(555) 987-6543</td>
                                        <td>maria.j@example.com</td>
                                        <td>June 2, 2023</td>
                                        <td><span class="badge bg-primary">3</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewClientModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editClientModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClientModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Client" class="client-avatar me-3">
                                                <div>
                                                    <h6 class="mb-0">Robert Brown</h6>
                                                    <small class="text-muted">Frequent Customer</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>(555) 234-5678</td>
                                        <td>robert.b@example.com</td>
                                        <td>June 10, 2023</td>
                                        <td><span class="badge bg-success">18</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewClientModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editClientModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClientModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Client" class="client-avatar me-3">
                                                <div>
                                                    <h6 class="mb-0">Emma Davis</h6>
                                                    <small class="text-muted">Regular Customer</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>(555) 876-5432</td>
                                        <td>emma.d@example.com</td>
                                        <td>May 25, 2023</td>
                                        <td><span class="badge bg-success">12</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewClientModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editClientModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClientModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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

<!-- Add Client Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addClientForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthday">
                            </div>
                            <div class="col-md-6">
                                <label for="clientType" class="form-label">Client Type</label>
                                <select class="form-select" id="clientType">
                                    <option value="new">New Customer</option>
                                    <option value="regular">Regular Customer</option>
                                    <option value="frequent">Frequent Customer</option>
                                    <option value="vip">VIP Customer</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="notes" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveClientBtn">Save Client</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Client Modal -->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientModalLabel">Edit Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editClientForm">
                    <input type="hidden" id="editClientId">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="editFirstName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="editLastName" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editPhone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="editPhone" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="editAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="editAddress">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editBirthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="editBirthday">
                        </div>
                        <div class="col-md-6">
                            <label for="editClientType" class="form-label">Client Type</label>
                            <select class="form-select" id="editClientType">
                                <option value="new">New Customer</option>
                                <option value="regular">Regular Customer</option>
                                <option value="frequent">Frequent Customer</option>
                                <option value="vip">VIP Customer</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="editNotes" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="updateClientBtn">Update Client</button>
            </div>
        </div>
    </div>
</div>

<!-- View Client Modal -->
<div class="modal fade" id="viewClientModal" tabindex="-1" aria-labelledby="viewClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewClientModalLabel">Client Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        <h4 id="clientFullName">John Smith</h4>
                        <span class="badge bg-success" id="clientTypeLabel">Regular Customer</span>
                    </div>
                    <div class="col-md-8">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6>Contact Information</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fas fa-envelope me-2"></i> <span id="clientEmail">john.smith@example.com</span></li>
                                    <li class="list-group-item"><i class="fas fa-phone me-2"></i> <span id="clientPhone">(555) 123-4567</span></li>
                                    <li class="list-group-item"><i class="fas fa-map-marker-alt me-2"></i> <span id="clientAddress">123 Main St, Anytown, USA</span></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Customer Info</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fas fa-calendar-alt me-2"></i> Birthday: <span id="clientBirthday">Jan 15, 1985</span></li>
                                    <li class="list-group-item"><i class="fas fa-clipboard-list me-2"></i> Total Visits: <span id="clientVisits">24</span></li>
                                    <li class="list-group-item"><i class="fas fa-clock me-2"></i> Last Visit: <span id="clientLastVisit">May 15, 2023</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>Notes</h6>
                                <p id="clientNotes" class="border rounded p-3">Prefers short haircuts. Has sensitive scalp. Always arrives on time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editClientModal">Edit Client</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Client Modal -->
<div class="modal fade" id="deleteClientModal" tabindex="-1" aria-labelledby="deleteClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteClientModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this client? This action cannot be undone.</p>
                <input type="hidden" id="deleteClientId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Client</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

{{--<script>--}}
{{--    // Toggle sidebar on mobile--}}
{{--    document.getElementById('menu-toggle').addEventListener('click', function() {--}}
{{--        const sidebar = document.querySelector('.sidebar');--}}
{{--        sidebar.classList.toggle('-translate-x-full');--}}
{{--    });--}}

{{--    // Search functionality--}}
{{--    document.getElementById('searchInput').addEventListener('keyup', function() {--}}
{{--        const searchValue = this.value.toLowerCase();--}}
{{--        const rows = document.querySelectorAll('#clientsTable tr');--}}

{{--        rows.forEach(row => {--}}
{{--            const text = row.textContent.toLowerCase();--}}
{{--            row.style.display = text.includes(searchValue) ? '' : 'none';--}}
{{--        });--}}
{{--    });--}}

{{--    // Filter functionality--}}
{{--    document.getElementById('filterSelect').addEventListener('change', function() {--}}
{{--        const filterValue = this.value;--}}
{{--        const rows = document.querySelectorAll('#clientsTable tr');--}}

{{--        if (filterValue === 'all') {--}}
{{--            rows.forEach(row => row.style.display = '');--}}
{{--            return;--}}
{{--        }--}}

{{--        rows.forEach(row => {--}}
{{--            const clientType = row.querySelector('small.text-muted').textContent.toLowerCase();--}}
{{--            let shouldShow = false;--}}

{{--            switch(filterValue) {--}}
{{--                case 'recent':--}}
{{--                    shouldShow = clientType.includes('new');--}}
{{--                    break;--}}
{{--                case 'frequent':--}}
{{--                    shouldShow = clientType.includes('frequent');--}}
{{--                    break;--}}
{{--                case 'inactive':--}}
{{--                    // This would need additional data to determine inactive clients--}}
{{--                    // For demo purposes, we'll just hide all--}}
{{--                    shouldShow = false;--}}
{{--                    break;--}}
{{--            }--}}

{{--            row.style.display = shouldShow ? '' : 'none';--}}
{{--        });--}}
{{--    });--}}

{{--    // Save new client--}}
{{--    document.getElementById('saveClientBtn').addEventListener('click', function() {--}}
{{--        const form = document.getElementById('addClientForm');--}}
{{--        if (form.checkValidity()) {--}}
{{--            // Here you would normally handle the form submission via AJAX--}}
{{--            // For demo purposes, we'll just close the modal and show an alert--}}
{{--            alert('Client saved successfully!');--}}
{{--            $('#addClientModal').modal('hide');--}}
{{--            form.reset();--}}
{{--        } else {--}}
{{--            form.reportValidity();--}}
{{--        }--}}
{{--    });--}}

{{--    // Update client--}}
{{--    document.getElementById('updateClientBtn').addEventListener('click', function() {--}}
{{--        const form = document.getElementById('editClientForm');--}}
{{--        if (form.checkValidity()) {--}}
{{--            // Here you would normally handle the form submission via AJAX--}}
{{--            alert('Client updated successfully!');--}}
{{--            $('#editClientModal').modal('hide');--}}
{{--        } else {--}}
{{--            form.reportValidity();--}}
{{--        }--}}
{{--    });--}}

{{--    // Delete client--}}
{{--    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {--}}
{{--        // Here you would normally handle the deletion via AJAX--}}
{{--        alert('Client deleted successfully!');--}}
{{--        $('#deleteClientModal').modal('hide');--}}
{{--    });--}}

{{--    // Populate edit form when edit button is clicked--}}
{{--    document.querySelectorAll('[data-bs-target="#editClientModal"]').forEach(button => {--}}
{{--        button.addEventListener('click', function() {--}}
{{--            const row = this.closest('tr');--}}
{{--            const name = row.querySelector('h6').textContent.split(' ');--}}
{{--            const firstName = name[0];--}}
{{--            const lastName = name[1];--}}
{{--            const email = row.querySelectorAll('td')[2].textContent;--}}
{{--            const phone = row.querySelectorAll('td')[1].textContent;--}}

{{--            document.getElementById('editFirstName').value = firstName;--}}
{{--            document.getElementById('editLastName').value = lastName;--}}
{{--            document.getElementById('editEmail').value = email;--}}
{{--            document.getElementById('editPhone').value = phone;--}}
{{--        });--}}
{{--    });--}}

{{--    // Populate view details when view button is clicked--}}
{{--    document.querySelectorAll('[data-bs-target="#viewClientModal"]').forEach(button => {--}}
{{--        button.addEventListener('click', function() {--}}
{{--            const row = this.closest('tr');--}}
{{--            const name = row.querySelector('h6').textContent.split(' ');--}}
{{--            const firstName = name[0];--}}
{{--            const lastName = name[1];--}}
{{--            const email = row.querySelectorAll('td')[2].textContent;--}}
{{--            const phone = row.querySelectorAll('td')[1].textContent;--}}
{{--            const address = row.querySelectorAll('td')[3].textContent;--}}
{{--            const lastVisit = row.querySelectorAll('td')[4].textContent;--}}
{{--            const visits = row.querySelectorAll('td')[5].textContent;--}}
{{--            const clientType = row.querySelector('small.text-muted').textContent;--}}
{{--        });--}}
{{--        document.getElementById('clientFullName').textContent = `${firstName} ${lastName}`;--}}
{{--        document.getElementById('clientEmail').textContent = email;--}}
{{--        document.getElementById('clientPhone').textContent = phone;--}}
{{--        document.getElementById('clientAddress').textContent = address;--}}
{{--        document.getElementById('clientLastVisit').textContent = lastVisit;--}}
{{--        document.getElementById('clientVisits').textContent = visits;--}}
{{--        document.getElementById('clientTypeLabel').textContent = clientType;--}}
{{--    });--}}
{{--    // Populate delete confirmation when delete button is clicked--}}
{{--    document.querySelectorAll('[data-bs-target="#deleteClientModal"]').forEach(button => {--}}
{{--        button.addEventListener('click', function() {--}}
{{--            const row = this.closest('tr');--}}
{{--            const clientId = row.querySelector('td').textContent; // Assuming the first cell contains the client ID--}}
{{--            document.getElementById('deleteClientId').value = clientId;--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
</div>
</div>
<x-admin.footer></x-admin.footer>
