<aside class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
    <div class="flex items-center space-x-2 px-4">
        <i class="fas fa-cut text-2xl"></i>
        <span class="text-2xl font-extrabold">Barbershop</span>
    </div>
    <nav class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
            <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
        </a>
        <a href="{{ route('admin.add-services') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
            <i class="fas fa-cut mr-3"></i>Add Services
        </a>
        <a href="{{ route('admin.show-services') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
            <i class="fas fa-cut mr-3"></i>Services
        </a>
        <a href="{{ route('admin.customers') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">
            <i class="fas fa-users mr-3"></i>Customers
        </a>
    </nav>
</aside>
