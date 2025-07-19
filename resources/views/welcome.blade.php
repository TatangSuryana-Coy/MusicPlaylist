<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MusicProject | Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-purple-200 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white/80 rounded-2xl shadow-xl p-10 max-w-md w-full text-center backdrop-blur">
        <h1 class="text-4xl font-extrabold text-purple-600 mb-4 drop-shadow">Selamat Datang di MusicProject</h1>
        <p class="text-purple-500 mb-7 text-lg">Project Laravel sederhana dengan tampilan modern dan nuansa ungu yang lembut.</p>
        <div class="flex justify-center gap-4">
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="px-6 py-2 rounded-lg bg-purple-500 text-white font-semibold shadow hover:bg-purple-600 transition">Login</a>
            @endif
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="px-6 py-2 rounded-lg bg-white text-purple-600 font-semibold shadow hover:bg-purple-100 border border-purple-300 transition">Register</a>
            @endif
        </div>
    </div>
</body>

</html>