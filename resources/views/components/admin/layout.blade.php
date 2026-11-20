<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900 antialiased">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        <x-admin.navbar />

        <x-admin.sidebar />


        <main class="p-4 md:ml-64 h-auto pt-20">
            @if (session('success'))
                <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif
            {{ $slot }}
        </main>

    </div>
</body>
</html>
