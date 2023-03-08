<x-guest-layout title="">
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <h3 class="text-xl font-semibold">Create a free account</h3>
            <div class="mt-2">
                {!! __('By signing up you agree to the :terms_of_service and :privacy_policy', [
                'terms_of_service' => '<a target="_blank" href="'.route('login').'"
                    class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                'privacy_policy' => '<a target="_blank" href="'.route('login').'"
                    class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                ]) !!}
            </div>
            </p>
        </div>

        <x-validation-errors class="mb-5" />

        <form action="{{ route('register') }}" method="post">
            @csrf

            <div>
                <x-label required for="name" value="{{ __('Organization name') }}" />
                <input type="text" name="name" id="name"
                    class="block w-full mt-1 border border-gray-200 px-4 py-2 rounded" value="{{ old('name') }}">
            </div>

            <div class="mt-4">
                <x-label required for="email" value="{{ __('Email address') }}" />
                <input type="email" inputmode="email" name="email" id="email"
                    class="block w-full mt-1 border border-gray-200 px-4 py-2 rounded" value="{{ old('email') }}">
            </div>

            <div class="mt-4">
                <x-label required for="password" value="{{ __('Password') }}" />
                <input type="password" name="password" id="password"
                    class="block w-full mt-1 border border-gray-200 px-4 py-2 rounded">
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
                <a href="{{ route('login') }}" class="text-blue-500">Sign in</a>
            </p>
        </div>
    </div>
</x-guest-layout>