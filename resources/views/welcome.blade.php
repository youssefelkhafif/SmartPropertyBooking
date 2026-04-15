<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YDooM · Book Smarter</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'DM Sans', sans-serif; }
        h1, h2, h3, .brand { font-family: 'Syne', sans-serif; }
        .mesh {
            background:
                radial-gradient(ellipse 60% 50% at 70% 30%, rgba(83,74,183,0.12) 0%, transparent 70%),
                radial-gradient(ellipse 40% 40% at 20% 80%, rgba(83,74,183,0.07) 0%, transparent 60%),
                #f8f7ff;
        }
    </style>
</head>
<body class="text-gray-800">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
            <span class="brand text-2xl font-extrabold tracking-tight text-violet-600">YDooM</span>
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-sm font-medium text-gray-600 hover:text-violet-600 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-gray-600 hover:text-violet-600 transition px-4 py-2">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="text-sm font-semibold bg-violet-600 text-white px-5 py-2 rounded-full shadow-sm hover:bg-violet-700 transition">
                        Get Started
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="mesh min-h-[88vh] flex items-center">
        <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-16 items-center">

            <div>
                <span class="inline-flex items-center gap-2 bg-violet-50 text-violet-700 text-xs font-semibold px-4 py-1.5 rounded-full border border-violet-100 mb-6">
                    <span class="w-1.5 h-1.5 bg-violet-500 rounded-full animate-pulse"></span>
                    Property Visit Booking Platform
                </span>

                <h1 class="text-5xl md:text-6xl font-extrabold leading-[1.1] tracking-tight mb-6">
                    Book Property<br>Visits
                    <span class="text-violet-600"> Smarter.</span>
                </h1>

                <p class="text-gray-500 text-lg leading-relaxed mb-8 max-w-md">
                    Discover spaces, schedule visits in real time, and pay securely —
                    all in one seamless platform built for modern property browsing.
                </p>

                <div class="flex items-center gap-4 flex-wrap">
                    <a href="{{ route('register') }}"
                       class="bg-violet-600 text-white px-7 py-3 rounded-full font-semibold shadow-md hover:bg-violet-700 active:scale-95 transition">
                        Start Booking
                    </a>
                    <a href="{{ route('login') }}"
                       class="text-gray-700 px-7 py-3 rounded-full border border-gray-200 font-medium hover:bg-gray-50 transition">
                        Sign In
                    </a>
                </div>

                <!-- Trust badges -->
                <div class="flex items-center gap-6 mt-10">
                    <div class="text-center">
                        <p class="text-2xl font-extrabold text-violet-600 brand">100%</p>
                        <p class="text-xs text-gray-400 mt-0.5">Secure Payments</p>
                    </div>
                    <div class="w-px h-10 bg-gray-200"></div>
                    <div class="text-center">
                        <p class="text-2xl font-extrabold text-violet-600 brand">Live</p>
                        <p class="text-xs text-gray-400 mt-0.5">Calendar Sync</p>
                    </div>
                    <div class="w-px h-10 bg-gray-200"></div>
                    <div class="text-center">
                        <p class="text-2xl font-extrabold text-violet-600 brand">Free</p>
                        <p class="text-xs text-gray-400 mt-0.5">To Register</p>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="relative">
                <div class="absolute -inset-4 bg-violet-100/50 rounded-3xl -z-10 blur-xl"></div>
                <img
                    src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=1200"
                    alt="Modern Property"
                    class="rounded-2xl shadow-2xl w-full h-[460px] object-cover ring-1 ring-violet-100"
                >
                <!-- Floating card -->
                <div class="absolute -bottom-4 -left-4 bg-white rounded-xl shadow-xl px-5 py-3 border border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">Next available</p>
                    <p class="text-sm font-semibold text-gray-800">Tomorrow · 10:00 AM</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Features -->
    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <p class="text-xs font-semibold uppercase tracking-widest text-violet-500 mb-3">Everything you need</p>
                <h2 class="text-4xl font-extrabold tracking-tight">Built for a seamless experience</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="group bg-gray-50 hover:bg-violet-50 border border-gray-100 hover:border-violet-200 p-8 rounded-2xl transition-all duration-300">
                    <div class="w-12 h-12 bg-violet-100 text-violet-600 rounded-xl flex items-center justify-center text-xl mb-5">📅</div>
                    <h3 class="text-lg font-bold mb-2">Smart Scheduling</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Powered by FullCalendar.js — browse open slots, pick a time, and confirm instantly.
                    </p>
                </div>

                <div class="group bg-gray-50 hover:bg-violet-50 border border-gray-100 hover:border-violet-200 p-8 rounded-2xl transition-all duration-300">
                    <div class="w-12 h-12 bg-violet-100 text-violet-600 rounded-xl flex items-center justify-center text-xl mb-5">💳</div>
                    <h3 class="text-lg font-bold mb-2">Stripe Payments</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        PCI-compliant Stripe Checkout. No card data on our servers — ever.
                    </p>
                </div>

                <div class="group bg-gray-50 hover:bg-violet-50 border border-gray-100 hover:border-violet-200 p-8 rounded-2xl transition-all duration-300">
                    <div class="w-12 h-12 bg-violet-100 text-violet-600 rounded-xl flex items-center justify-center text-xl mb-5">⚡</div>
                    <h3 class="text-lg font-bold mb-2">Real-time Status</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Bookings move from pending to confirmed automatically. Your dashboard stays in sync.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-violet-600 py-20 px-6 text-center">
        <p class="text-violet-200 text-sm font-semibold uppercase tracking-widest mb-4">Ready to start?</p>
        <h2 class="text-4xl font-extrabold text-white mb-4 tracking-tight">Your next visit is one click away.</h2>
        <p class="text-violet-200 max-w-md mx-auto mb-8">
            Join YDooM and experience property visits the way they should be — effortless.
        </p>
        <a href="{{ route('register') }}"
           class="inline-block bg-white text-violet-700 font-bold px-8 py-3 rounded-full shadow-lg hover:bg-violet-50 active:scale-95 transition">
            Create Free Account
        </a>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t py-8 text-center">
        <p class="brand text-lg font-extrabold text-violet-600 mb-1">YDooM</p>
        <p class="text-xs text-gray-400">© {{ date('Y') }} YDooM. All rights reserved.</p>
    </footer>

</body>
</html>