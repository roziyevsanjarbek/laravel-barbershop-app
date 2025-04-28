<div class="sidebar bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
    <a href="#" class="text-white flex items-center space-x-2 px-4">
        <i class="fas fa-cut text-2xl"></i>
        <span class="text-2xl font-bold">BarberShop</span>
    </a>
    <nav class="mt-10">
        <a href="{{ route('admin.dashboard') }}"
           class="block py-2.5 px-4 rounded transition duration-200 {{ Route::is('admin.dashboard') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }}">
            <i class="fas fa-home mr-2"></i>Dashboard
        </a>
        <a href="{{ route('admin.clients') }}"
           class="block py-2.5 px-4 rounded transition duration-200 {{ Route::is('admin.clients') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }} ">
            <i class="fas fa-users mr-2"></i>Clients
        </a>
        <a href="{{ route('admin.services') }}"
           class="block py-2.5 px-4 rounded transition duration-200 {{ Route::is('admin.services') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }} ">
            <i class="fas fa-cut mr-3"></i>Service
        </a>
        <a href="{{ route('admin.add-service') }}"
           class="block py-2.5 px-4 rounded transition duration-200 {{ Route::is('admin.add-service') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }} ">
            <i class="fas fa-plus-circle mr-3"></i>Add New Service
        </a>
        <a href="{{ route('admin.my-profile') }}"
           class="block py-2.5 px-4 rounded transition duration-200 {{ Route::is('admin.my-profile') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }} ">
            <i class="fas fa-user mr-2"></i>Profile
        </a>
        <a href="/dashboard" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-700 rounded mb-1">
            <i class="fas fa-sign-out-alt mr-3"></i> Logout
        </a>
    </nav>
</div>
