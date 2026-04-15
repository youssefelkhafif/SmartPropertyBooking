<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YDooM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'DM Sans', sans-serif; }
        .brand { font-family: 'Syne', sans-serif; }
    </style>
</head>
<body class="font-sans bg-gray-950">

    <div class="min-h-screen flex">

        <!-- Left panel (decorative — hidden on mobile) -->
        <div class="hidden lg:flex lg:w-1/2 relative flex-col justify-between p-12 overflow-hidden"
             style="background: linear-gradient(135deg, #2d1f6e 0%, #4c3ab5 50%, #6d28d9 100%)">

            <!-- Pattern overlay -->
            <div class="absolute inset-0 opacity-10"
                 style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 32px 32px"></div>

            <span class="brand text-3xl font-extrabold text-white relative z-10">YDooM</span>

            <div class="relative z-10">
                <blockquote class="text-white/80 text-lg leading-relaxed mb-6 max-w-sm">
                    "The smartest way to schedule property visits — calendar, payments, and status all in one place."
                </blockquote>

                <div class="flex gap-3">
                    <div class="bg-white/10 border border-white/20 rounded-xl px-4 py-2 text-white text-xs font-medium">📅 FullCalendar</div>
                    <div class="bg-white/10 border border-white/20 rounded-xl px-4 py-2 text-white text-xs font-medium">💳 Stripe</div>
                    <div class="bg-white/10 border border-white/20 rounded-xl px-4 py-2 text-white text-xs font-medium">⚡ Laravel</div>
                </div>
            </div>
        </div>

        <!-- Right panel (auth form) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="w-full max-w-sm">

                <!-- Mobile brand -->
                <div class="text-center mb-8 lg:hidden">
                    <span class="brand text-3xl font-extrabold text-violet-600">YDooM</span>
                    <p class="text-gray-400 text-sm mt-1">Property Visit Platform</p>
                </div>

                {{ $slot }}

            </div>
        </div>

    </div>

</body>
</html>