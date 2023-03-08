<x-guest-layout title="Forgot password">
    <div class="w-full max-w-md">
        <div class="text-center mb-5">
            <h3 class="text-xl font-semibold">Welcome Back</h3>
            <p class="text-gray-600">Sign in with your email and password</p>
        </div>
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div>
                <x-label required for="email" value="{{ __('Email address') }}" />
                <input type="email" inputmode="email" name="email" id="email"
                    class="block w-full mt-1 border border-gray-200 px-4 py-2 rounded">
            </div>

            <div class="mt-4">
                <x-label required for="password" value="{{ __('Password') }}" />
                <input type="password" name="password" id="password"
                    class="block w-full mt-1 border border-gray-200 px-4 py-2 rounded">
            </div>

            <div class="mt-4">
                <a href="{{ route('password.email') }}" class="text-sm text-[#9381FF]">
                    {{ __('Forgot password?') }}
                </a>
            </div>

            <div class="mt-5">
                <x-primary-button class="w-full justify-center">
                    {{ __('Sign In') }}
                </x-primary-button>
            </div>
        </form>

        <div class="mt-10 text-sm p-6 bg-gray-50 rounded-md">
            <p class="text-center">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-[#9381FF]">Sign up</a>
            </p>
        </div>
    </div>
</x-guest-layout>