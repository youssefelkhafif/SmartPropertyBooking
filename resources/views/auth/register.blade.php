<x-guest-layout>

<h2 class="text-2xl font-extrabold text-gray-900 mb-1" style="font-family:'Syne',sans-serif">
    Create your account
</h2>
<p class="text-sm text-gray-400 mb-8">Start booking property visits today</p>

@if ($errors->any())
    <div class="bg-red-50 border border-red-100 text-red-600 text-sm rounded-xl px-4 py-3 mb-5">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    <div>
        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5 block">Full Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
            placeholder="John Doe"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition bg-gray-50">
    </div>

    <div>
        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5 block">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
            placeholder="you@example.com"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition bg-gray-50">
    </div>

    <div>
        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5 block">Password</label>
        <input type="password" name="password" required autocomplete="new-password"
            placeholder="Min. 8 characters"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition bg-gray-50">
    </div>

    <div>
        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5 block">Confirm Password</label>
        <input type="password" name="password_confirmation" required autocomplete="new-password"
            placeholder="Repeat your password"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition bg-gray-50">
    </div>

    <button type="submit"
        class="w-full bg-violet-600 text-white py-3 rounded-xl font-semibold text-sm hover:bg-violet-700 active:scale-95 transition mt-2 shadow-sm">
        Create Account
    </button>

    <p class="text-center text-sm text-gray-400 pt-2">
        Already have an account?
        <a href="{{ route('login') }}" class="text-violet-600 font-medium hover:underline">Sign in</a>
    </p>

</form>

</x-guest-layout>