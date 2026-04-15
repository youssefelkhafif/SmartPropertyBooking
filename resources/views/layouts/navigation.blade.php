<nav x-data="{ open: false }" class="bg-white shadow-md border-b">

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            <!-- LOGO -->
            <div class="text-2xl font-extrabold text-purple-600">
                YDooM
            </div>

            <!-- LINKS -->
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('dashboard') }}"
                   class="hover:text-purple-600 transition">
                    Dashboard
                </a>

                <a href="{{ route('calendar') }}"
                   class="hover:text-purple-600 transition">
                    Calendar
                </a>
            </div>

            <!-- USER -->
            <div class="relative" x-data="{ dropdown: false }">

                <button @click="dropdown = !dropdown"
                    class="flex items-center gap-2 bg-purple-100 px-3 py-1 rounded-lg hover:bg-purple-200 transition">

                    {{ Auth::user()->name }}

                    <svg class="w-4 h-4" fill="none" stroke="currentColor">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>

                <!-- DROPDOWN -->
                <div x-show="dropdown"
                     x-transition
                     @click.outside="dropdown = false"
                     class="absolute right-0 mt-3 w-44 bg-white rounded-xl shadow-lg border">

                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-2 hover:bg-gray-100">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50">
                            Logout
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</nav>