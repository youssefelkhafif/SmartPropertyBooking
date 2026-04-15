<x-app-layout>

    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">

        {{-- ✅ SELECTED PLACE --}}
        @if (isset($selectedPlace))
            <div class="mb-4 p-4 bg-blue-100 rounded-lg flex items-center gap-4">
                <img src="{{ $selectedPlace->image }}"
                     class="w-20 h-20 object-cover rounded-lg">

                <div>
                    <h3 class="font-bold text-lg">
                        {{ $selectedPlace->name }}
                    </h3>
                    <p class="text-gray-600">
                        {{ $selectedPlace->location }}
                    </p>
                </div>
            </div>
        @endif

        {{-- 🔥 IMPORTANT: hidden input for JS --}}
        <input type="hidden"
               id="place_id"
               value="{{ $selectedPlace->id ?? '' }}">

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

        {{-- ⚠️ WARNING IF NO PLACE SELECTED --}}
        @if (!isset($selectedPlace))
            <div class="mb-4 p-4 bg-red-100 text-red-600 rounded-lg">
                ⚠️ Please select a place first before booking.
            </div>
        @endif

        <!-- CALENDAR -->
        <div id="calendar" class="bg-white rounded-lg"></div>

    </div>

    <!-- MODAL -->
    <div id="actionModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

        <div class="bg-white p-6 rounded-2xl shadow-xl w-80 text-center">

            <h2 class="text-xl font-bold mb-3">Visit Options</h2>

            <p id="modalText" class="mb-4 text-gray-600"></p>

            <!-- PAY -->
            <button id="payBtn"
                class="bg-green-600 text-white px-4 py-2 rounded-lg mr-2 hover:bg-green-700 transition">
                💳 Pay
            </button>

            <!-- DELETE -->
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

</x-app-layout>