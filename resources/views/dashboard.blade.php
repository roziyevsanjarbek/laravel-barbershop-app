<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h2 class="text-3xl font-semibold mb-6">Welcome back {{ Auth::user()->name }}</h2>

        <div class="flex justify-center space-x-6">
            <!-- Admin Panel Button -->
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 w-40">
                Admin Panel
            </a>

            <!-- User Panel Button -->
            <a href="{{ route('user.dashboard') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 w-40">
                User Panel
            </a>
    </div>
</div>

</body>
</html>
