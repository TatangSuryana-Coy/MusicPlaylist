<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MusicProject | Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-200 via-pink-100 to-yellow-100 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white/80 rounded-xl shadow-lg p-8 max-w-md w-full text-center backdrop-blur">
        <h1 class="text-3xl font-bold text-blue-700 mb-4">Selamat Datang di MusicProject</h1>
        <p class="text-gray-700 mb-6">Project Laravel sederhana dengan tampilan modern dan minimalis.</p>
        <div class="flex justify-center gap-4">
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="px-5 py-2 rounded-lg bg-blue-500 text-white font-semibold shadow hover:bg-blue-600 transition">Login</a>
            @endif
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="px-5 py-2 rounded-lg bg-white text-blue-700 font-semibold shadow hover:bg-blue-100 transition">Register</a>
            @endif
        </div>
    </div>
</body>

</html>