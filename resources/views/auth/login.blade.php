<x-guest-layout>
    <div class="w-full max-w-xl mx-auto mt-16 p-10 bg-white/90 shadow-2xl rounded-3xl border border-blue-200 backdrop-blur-md">
        <h2 class="text-4xl font-extrabold text-center text-blue-950 mb-8 tracking-tight">
            Welcome Back
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-8">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-blue-950" />
                <x-text-input
                    id="email"
                    class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-blue-950" />
                <x-text-input
                    id="password"
                    class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me + Forgot -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mt-2 gap-2">
                <label for="remember_me" class="flex items-center text-sm text-gray-600">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-800 shadow-sm focus:ring-blue-800 mr-2" name="remember">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-800 hover:underline">Forgot your password?</a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <x-primary-button class="w-full justify-center bg-blue-950 hover:bg-blue-900 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg text-lg">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

