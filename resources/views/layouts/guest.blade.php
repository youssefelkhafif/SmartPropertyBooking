<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YDooM</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-indigo-600 to-purple-800">

        <div class="w-full max-w-md">

            <!-- 🔥 BRAND -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-extrabold text-white tracking-wide">
                    YDooM
                </h1>
                <p class="text-purple-200 text-sm">
                    Booking & Payments Platform
                </p>
            </div>

            <!-- CARD -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                {{ $slot }}
            </div>

        </div>

    </div>

</body>
</html>