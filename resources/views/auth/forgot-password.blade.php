<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-guest.auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-form.input-label for="email" :value="__('Email')" />
            <x-shared.text-input
                id="email"
                class="mt-1 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
            />
            <x-form.input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-shared.primary-button>
                {{ __('Email Password Reset Link') }}
            </x-shared.primary-button>
        </div>
    </form>
</x-guest-layout>
