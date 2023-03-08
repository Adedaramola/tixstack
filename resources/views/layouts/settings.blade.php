@props(['title'])

@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? __('Document') }}</title>

    @stack('meta')

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-800 bg-white">
    <div class="min-h-screen">
        @include('partials.desktop-navigation-menu')

        <div class="pt-10 bg-gray-50 border-b border-gray-100">
            <h3 class="mb-5 text-center text-2xl text-gray-600 font-semibold">
                Account Settings
            </h3>

            <div class="hidden space-x-8 sm:-my-px sm:flex sm:justify-center">
                <x-nav-link href="#">
                    {{ __('Profile') }}
                </x-nav-link>

                <x-nav-link href="#">
                    {{ __('Notifications') }}
                </x-nav-link>

                <x-nav-link href="#">
                    {{ __('Payouts') }}
                </x-nav-link>

                <x-nav-link href="#">
                    {{ __('Premium') }}
                </x-nav-link>
            </div>
        </div>

        <div>
            {{ $slot }}
        </div>
    </div>

    @stack('scripts')
    @livewireScripts
</body>

</html>