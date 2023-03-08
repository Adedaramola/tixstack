@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    @stack('meta')

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-800">
    <div class="min-h-screen flex flex-col items-center pt-16 pb-12">
        <div class="">
            <a href="/" class="text-3xl text-orange-500">
                {{ __('tixstack') }}
            </a>
        </div>

        <main class="w-full sm:max-w-md mt-5 px-6 py-4">
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
    @livewireScripts
</body>

</html>