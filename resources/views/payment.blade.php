<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Payment</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-xl">

        <!-- TITLE -->
        <h2 class="text-2xl font-bold text-center mb-6">
            💳 Complete Payment
        </h2>

        <!-- ERROR -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- INFO -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6 text-sm text-gray-600">
            <p><strong>Visit ID:</strong> {{ $visit->id }}</p>
            <p><strong>Amount:</strong> 200 MAD</p>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('payment.process', $visit->id) }}">
            @csrf

            <!-- CARD NUMBER -->
            <div class="mb-4">
                <label class="block text-sm mb-1">Card Number</label>
                <input type="text" name="card_number"
                    placeholder="4242 4242 4242"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
            </div>

            <!-- ROW -->
            <div class="flex gap-4 mb-4">

                <!-- EXPIRY -->
                <div class="w-1/2">
                    <label class="block text-sm mb-1">Expiry</label>
                    <input type="text" name="expiry"
                        placeholder="MM/YY"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
                </div>

                <!-- CVV -->
                <div class="w-1/2">
                    <label class="block text-sm mb-1">CVV</label>
                    <input type="text" name="cvv"
                        placeholder="123"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
                </div>

            </div>

            <!-- PAY BUTTON -->
            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                ✅ Pay 200 MAD
            </button>
        </form>

        <!-- BACK -->
        <a href="/calendar"
            class="block text-center mt-4 text-gray-500 hover:text-gray-700 text-sm">
            ← Cancel and go back
        </a>

    </div>

</body>

</html>