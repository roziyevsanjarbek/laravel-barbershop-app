<x-admin.header></x-admin.header>
<div class="bg-gray-100">
    <div class="flex">
<x-admin.sidebar></x-admin.sidebar>

<div class="flex-1">
    @if($image)
        <x-admin.navbar :image="$image"></x-admin.navbar>
    @else
        <x-admin.navbar :image="null"></x-admin.navbar>
    @endif
    <div class="flex-1 p-4 md:p-10">
<div class="bg-white rounded-lg shadow mb-6">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
        <h3 class="text-lg font-medium text-gray-900">Total Schedule</h3>
    </div>
    <div class="p-4">
        <div class="overflow-hidden overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barber</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($bookings as $booking)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->date }} {{ $booking->time }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                                <img src="{{ asset('storage/' . $booking->user->image->path) }}" alt="Client" class="h-full w-full object-cover">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $booking->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $booking->user->phone }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $booking->barber->last_name }} {{ $booking->barber->first_name }}</div>
                                <div class="text-sm text-gray-500">{{ $booking->barber->phone }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->service->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->service->duration }} min</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($booking->status == 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $booking->status }}</span>
                        @elseif($booking->status == 'in Progress')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $booking->status }}</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> {{ $booking->status }} </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="{{ route('admin.update-schedule', $booking ->id) }}" class="text-gray-600 hover:text-blue-600 p-2 rounded-full hover:bg-blue-50">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.delete-schedule', $booking->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-red-600 p-2 rounded-full hover:bg-red-50">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>
    </div>
</div>
<x-admin.footer></x-admin.footer>
