<x-guest-layout title="Forgot password">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <h3 class="text-xl font-semibold">Forgot your password</h3>
            <p class="text-gray-600">
                Enter the email you registered your account with
            </p>
        </div>

        <x-validation-errors class="mb-5" />

        <form action="{{ route('password.email') }}" method="post">
            @csrf

            <div>
                <x-label required for="email" value="{{ __('Email address') }}" />
                <input type="email" inputmode="email" name="email" id="email"
                    class="block w-full mt-1 border border-gray-200 px-4 py-2 rounded">
            </div>

            <div class="mt-5">
                <x-primary-button class="w-full justify-center">
                    {{ __('Request password reset') }}
                </x-primary-button>
            </div>
        </form>

        <div class="mt-10 text-sm p-6 bg-gray-50 rounded-md">
            <p class="text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500">Sign in</a>
            </p>
        </div>
    </div>
</x-guest-layout>