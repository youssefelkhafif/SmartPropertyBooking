<x-guest-layout>

<h2 class="text-2xl font-bold text-center mb-6">
    Welcome Back 👋
</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="space-y-4">

        <input type="email" name="email"
            placeholder="Email"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500">

        <input type="password" name="password"
            placeholder="Password"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500">

    </div>

    <button type="submit"
        class="w-full mt-6 bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition">
        Login
    </button>

</form>

</x-guest-layout>