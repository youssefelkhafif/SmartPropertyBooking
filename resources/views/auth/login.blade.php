<x-guest-layout>

<h2 class="text-2xl font-extrabold text-gray-900 mb-1" style="font-family:'Syne',sans-serif">
    Welcome back
</h2>
<p class="text-sm text-gray-400 mb-8">Sign in to your YDooM account</p>

@if ($errors->any())
    <div class="bg-red-50 border border-red-100 text-red-600 text-sm rounded-xl px-4 py-3 mb-5">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <div>
        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5 block">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
            placeholder="you@example.com"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition bg-gray-50">
    </div>

    <div>
        <div class="flex justify-between items-center mb-1.5">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Password</label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-xs text-violet-500 hover:underline">Forgot?</a>
            @endif
        </div>
        <input type="password" name="password" required autocomplete="current-password"
            placeholder="••••••••"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition bg-gray-50">
    </div>

    <div class="flex items-center gap-2 pt-1">
        <input type="checkbox" name="remember" id="remember"
               class="w-4 h-4 accent-violet-600 rounded">
        <label for="remember" class="text-sm text-gray-500">Keep me signed in</label>
    </div>

    <button type="submit"
        class="w-full bg-violet-600 text-white py-3 rounded-xl font-semibold text-sm hover:bg-violet-700 active:scale-95 transition mt-2 shadow-sm">
        Sign In
    </button>

    <p class="text-center text-sm text-gray-400 pt-2">
        No account?
        <a href="{{ route('register') }}" class="text-violet-600 font-medium hover:underline">Create one free</a>
    </p>

</form>

</x-guest-layout>