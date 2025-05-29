<x-guest-layout>
    <div class="w-full max-w-xl mx-auto mt-9 p-10 bg-white/90 shadow-2xl rounded-3xl border border-blue-200 backdrop-blur-md">
        <h2 class="text-4xl font-extrabold text-center text-blue-950 mb-8 tracking-tight">
            Create an Account
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-8">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-sm font-semibold text-blue-950" />
                <x-text-input id="name" class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm"
                              type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-blue-950" />
                <x-text-input id="email" class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm"
                              type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Role -->
            <div>
                <x-input-label for="role" :value="__('Register As')" class="text-sm font-semibold text-blue-950" />
                <select id="role" name="role" required
                        class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm">
                    <option value="">-- Select Role --</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-blue-950" />
                <x-text-input id="password" class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm"
                              type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-semibold text-blue-950" />
                <x-text-input id="password_confirmation" class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm"
                              type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                <a class="text-sm text-blue-800 hover:underline" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="bg-blue-950 hover:bg-blue-900 text-white font-bold py-2 px-6 rounded-xl shadow-lg transition duration-300">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
