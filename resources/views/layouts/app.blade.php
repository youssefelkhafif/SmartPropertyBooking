<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>YDooM</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col">

        @include('layouts.navigation')

        <!-- HEADER -->
        @isset($header)
            <header class="bg-white shadow-sm border-b">
                <div class="max-w-7xl mx-auto px-6 py-4">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- CONTENT -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>

    </div>

</body>
</html>