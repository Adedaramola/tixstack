<x-guest-layout title="">
    <div class="w-full max-w-md">
        <form action="{{ route('register') }}" method="post">
            @csrf

            <div>
                <x-label required for="name" value="{{ __('Organization name') }}" />
                <input type="text" name="name" id="name"
                    class="block w-full mt-1 border border-gray-200 px-4 py-2 rounded">
            </div>

            <div class="mt-4">
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
                <x-label for="password" value="{{ __('How did you hear about us?') }}" />
                <select name="" id="" class="w-full block mt-1 border border-gray-200 px-4 py-2 rounded">
                    <option value="twitter" selected>Twitter</option>
                </select>
            </div>

            <div class="mt-5">
                <x-primary-button class="w-full justify-center">
                    {{ __('Create account') }}
                </x-primary-button>
            </div>
        </form>

        <div class="mt-10 text-sm p-6 bg-gray-50 rounded-md">
            <p class="text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="text-[#9381FF]">Sign in</a>
            </p>
        </div>
    </div>
</x-guest-layout>