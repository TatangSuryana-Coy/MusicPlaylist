<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                background: linear-gradient(180deg, #fbbf24 0%, #f472b6 100%);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen relative overflow-x-hidden">
        <!-- Parallax Matahari Senja -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 z-0 pointer-events-none">
            <div class="rounded-full bg-gradient-to-b from-yellow-300 via-orange-400 to-pink-400 w-60 h-60 shadow-2xl opacity-70 blur-2xl"></div>
        </div>
        <!-- Parallax Laut -->
        <div class="absolute bottom-0 left-0 w-full z-0 pointer-events-none">
            <svg class="w-full" height="180" viewBox="0 0 1440 180" fill="none">
                <path fill="#38bdf8" fill-opacity="0.8" d="M0,160L60,154.7C120,149,240,139,360,128C480,117,600,107,720,117.3C840,128,960,160,1080,170.7C1200,181,1320,171,1380,165.3L1440,160L1440,180L1380,180C1320,180,1200,180,1080,180C960,180,840,180,720,180C600,180,480,180,360,180C240,180,120,180,60,180L0,180Z"></path>
                <path fill="#0ea5e9" fill-opacity="0.7" d="M0,180L80,172C160,164,320,144,480,132.7C640,121,800,114,960,124.7C1120,135,1280,165,1360,176.7L1440,180L1440,180L1360,180C1280,180,1120,180,960,180C800,180,640,180,480,180C320,180,160,180,80,180L0,180Z"></path>
            </svg>
        </div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
            <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="w-20 h-20 fill-current text-orange-400 drop-shadow" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/80 dark:bg-gray-900/80 shadow-xl overflow-hidden sm:rounded-lg backdrop-blur">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
