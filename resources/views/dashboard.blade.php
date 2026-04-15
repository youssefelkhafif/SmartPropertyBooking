<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">
                    Welcome 👋
                </h3>

                <p class="mb-6 text-gray-700 dark:text-gray-300">
                    Manage your property visits easily.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- 📅 Calendar -->
                    <a href="{{ route('calendar') }}"
                       class="block p-6 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                        📅 Open Calendar
                        <p class="text-sm mt-2">Book and manage visits</p>
                    </a>

                    <!-- 👤 Profile -->
                    <a href="{{ route('profile.edit') }}"
                       class="block p-6 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                        👤 Profile Settings
                        <p class="text-sm mt-2">Update your account</p>
                    </a>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>