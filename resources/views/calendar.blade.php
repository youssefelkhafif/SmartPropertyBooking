<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Calendar</title>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">

        <!-- HEADER -->
        <h2 class="text-2xl font-bold mb-6">📅 Property Visit Booking</h2>

        <!-- FILTERS -->
        <div class="mb-6 space-x-2">
            <button onclick="filterStatus('all')" class="px-4 py-2 bg-gray-300 rounded-lg">
                All
            </button>

            <button onclick="filterStatus('pending')" class="px-4 py-2 bg-orange-500 text-white rounded-lg">
                Pending
            </button>

            <button onclick="filterStatus('confirmed')" class="px-4 py-2 bg-green-600 text-white rounded-lg">
                Confirmed
            </button>
        </div>

        <!-- CALENDAR -->
        <div id="calendar" class="bg-white rounded-lg"></div>

    </div>

    <!-- MODAL (PAY + DELETE) -->
    <div id="actionModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

        <div class="bg-white p-6 rounded-2xl shadow-xl w-80 text-center">

            <h2 class="text-xl font-bold mb-3">Visit Options</h2>

            <p id="modalText" class="mb-4 text-gray-600"></p>

            <!-- PAY BUTTON -->
            <button id="payBtn"
                class="bg-green-600 text-white px-4 py-2 rounded-lg mr-2 hover:bg-green-700 transition">
                💳 Pay
            </button>

            <!-- DELETE BUTTON -->
            <button id="deleteBtn"
                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                🗑 Delete
            </button>

            <!-- CLOSE -->
            <div class="mt-4">
                <button onclick="closeModal()"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">
                    Cancel
                </button>
            </div>

        </div>
    </div>

</body>

</html>