    <header>
        <h2 class="text-3xl font-extrabold text-blue-950 mb-2 tracking-tight">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-sm text-gray-600 mb-6">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Email Verification Form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-sm font-semibold text-blue-950" />
            <x-text-input id="name" name="name" type="text"
                          class="mt-2 block w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm"
                          :value="old('name', $user->name)"
                          required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-blue-950" />
            <x-text-input id="email" name="email" type="email"
                          class="mt-2 block w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 shadow-sm"
                          :value="old('email', $user->email)"
                          required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            <!-- Email Verification Notice -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 text-sm text-gray-700">
                    <p>
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm text-blue-800 hover:text-blue-900 ml-1">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-blue-950 hover:bg-blue-900 text-white font-bold py-2 px-6 rounded-xl shadow-lg transition duration-300">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
