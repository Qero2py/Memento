<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Memento') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-white relative">
        @isset($coverUrl)
            <div class="fixed inset-0 -z-10">
                <img 
                    src="{{ $coverUrl }}" 
                    alt="Background" 
                    class="w-full h-full object-cover blur-2xl opacity-40 brightness-75" 
                >
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
        @else
            <div class="fixed inset-0 -z-10 bg-gradient-to-br from-[#0f0c29] via-[#302b63] to-[#24243e]"></div>
        @endisset


        <main class="p-6 sm:p-8">
            {{ $slot }}
        </main>

        @stack('scripts')
    </body>
</html>