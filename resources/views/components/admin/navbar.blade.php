<header class="bg-white shadow-sm z-10">
    <div class="flex items-center justify-between p-4">
        <div class="flex items-center">
            <button class="text-gray-500 focus:outline-none md:hidden">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-2xl font-semibold text-gray-800 ml-4">Hairdresser Dashboard</h1>
        </div>
        <div class="flex items-center space-x-4">
            <button class="text-gray-500 focus:outline-none">
                <i class="fas fa-bell"></i>
                <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
            </button>
            <div class="relative">
                <button class="flex items-center text-gray-700 focus:outline-none">
                    @if($image)
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                    @else
                    <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                    @endif
                    <span class="ml-2">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>
            </div>
        </div>
    </div>
</header>
