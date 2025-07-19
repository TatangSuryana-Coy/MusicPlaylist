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
    </head>
    <body
        class="font-sans antialiased
            @if($theme === 'blue')
                bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-100
            @elseif($theme === 'dark')
                bg-gray-900 text-gray-100
            @else
                bg-pink-50 text-pink-900 dark:bg-pink-900 dark:text-pink-100
            @endif
        "
    >
        @auth
        <script>
            if (@json(auth()->user()->dark_mode)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
        @endauth
        <div class="min-h-screen relative">
            <livewire:layout.navigation />
            <!-- Sidebar overlay -->
            <x-side-menu x-model="sidebarOpen" />
            <!-- Main content, no margin left -->
            <div class="transition-all duration-200">
                @if (isset($header))
                    <header class="bg-white shadow dark:bg-gray-800 dark:shadow-lg">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    confirmButtonColor: 
                        @if($theme === 'blue')
                            '#3b82f6'
                        @elseif($theme === 'dark')
                            '#334155'
                        @else
                            '#ec4899'
                        @endif
                });
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: @json(session('error')),
                    confirmButtonColor: 
                        @if($theme === 'blue')
                            '#3b82f6'
                        @elseif($theme === 'dark')
                            '#334155'
                        @else
                            '#ef4444'
                        @endif
                });
            });
        </script>
    @endif
</html>
