<x-guest-layout>
    <div class="w-full max-w-xl mx-auto mt-16 p-10 bg-white/90 shadow-2xl rounded-3xl border border-blue-200 backdrop-blur-md">
        <h2 class="text-3xl font-extrabold text-center text-blue-950 mb-6 tracking-tight">
            Forgot Your Password?
        </h2>

        <p class="mb-6 text-sm text-gray-600 text-center">
            {{ __('No problem. Just enter your email address and we’ll send you a link to reset your password.') }}
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-blue-950" />
                <x-text-input id="email" type="email"
                              name="email"
                              :value="old('email')"
                              required autofocus
                              class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end">
                <x-primary-button class="bg-blue-950 hover:bg-blue-900 text-white font-bold py-2 px-6 rounded-xl shadow-lg transition duration-300">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
