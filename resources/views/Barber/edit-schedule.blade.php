<x-admin.header></x-admin.header>
<div class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <x-admin.sidebar></x-admin.sidebar>

<div class="flex-1">
    @if($image)
        <x-admin.navbar :image="$image"></x-admin.navbar>
    @else
        <x-admin.navbar :image="null"></x-admin.navbar>
    @endif
    <div class="flex-1 p-4 md:p-10">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('admin.update-schedule', $booking->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editTime" class="form-label text-sm font-medium text-gray-700">Appointment Date</label>
                                <input type="date" class="form-control" id="editTime" required name="date">
                                <div class="invalid-feedback">Time is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editTime" class="form-label text-sm font-medium text-gray-700">Appointment Time</label>
                                <input type="time" class="form-control" id="editTime" name="time" required>
                                <div class="invalid-feedback">Time is required.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editStatus" class="form-label text-sm font-medium text-gray-700">Status</label>
                                <select class="form-select" id="editStatus" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Confirmed</option>
                                </select>
                                <div class="invalid-feedback">Please select a status.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Update Appointment</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
    </div>
</div>
<x-admin.footer></x-admin.footer>
