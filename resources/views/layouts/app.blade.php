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
        @include('layouts.navigation-menu')


        <div>
            {{ $slot }}
        </div>
    </div>

    @stack('scripts')
    @livewireScripts
</body>

</html>