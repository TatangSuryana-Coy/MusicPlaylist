<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senja Beach | Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(180deg, #fbbf24 0%, #f472b6 100%);
        }
        .parallax {
            perspective: 1px;
            height: 100vh;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .parallax__layer {
            position: absolute;
            left: 0; right: 0;
            width: 100%;
        }
        .parallax__layer--back {
            top: 0;
            z-index: 1;
            transform: translateZ(-1px) scale(2);
        }
        .parallax__layer--base {
            top: 0;
            z-index: 2;
        }
        .parallax__layer--front {
            top: 0;
            z-index: 3;
        }
    </style>
</head>
<body class="antialiased font-sans min-h-screen relative overflow-x-hidden">
    <div class="parallax relative min-h-screen">
        <!-- Matahari Senja -->
        <div class="parallax__layer parallax__layer--back flex justify-center items-start pt-24 pointer-events-none">
            <div class="rounded-full bg-gradient-to-b from-yellow-300 via-orange-400 to-pink-400 w-72 h-72 shadow-2xl opacity-80"></div>
        </div>
        <!-- Laut -->
        <div class="parallax__layer parallax__layer--base pointer-events-none">
            <svg class="w-full absolute bottom-0 left-0" height="320" viewBox="0 0 1440 320" fill="none">
                <path fill="#38bdf8" fill-opacity="0.8" d="M0,256L60,229.3C120,203,240,149,360,154.7C480,160,600,224,720,229.3C840,235,960,181,1080,176C1200,171,1320,213,1380,234.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                <path fill="#0ea5e9" fill-opacity="0.7" d="M0,288L80,272C160,256,320,224,480,202.7C640,181,800,171,960,186.7C1120,203,1280,245,1360,266.7L1440,288L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
            </svg>
        </div>
        <!-- Pasir Pantai -->
        <div class="parallax__layer parallax__layer--front pointer-events-none">
            <svg class="w-full absolute bottom-0 left-0" height="180" viewBox="0 0 1440 180" fill="none">
                <path fill="#fde68a" d="M0,160L60,154.7C120,149,240,139,360,128C480,117,600,107,720,117.3C840,128,960,160,1080,170.7C1200,181,1320,171,1380,165.3L1440,160L1440,180L1380,180C1320,180,1200,180,1080,180C960,180,840,180,720,180C600,180,480,180,360,180C240,180,120,180,60,180L0,180Z"></path>
            </svg>
        </div>
        <!-- Konten Welcome -->
        <div class="relative z-10 flex flex-col items-center justify-center min-h-screen">
            <div class="bg-white/70 dark:bg-gray-900/70 rounded-xl shadow-xl px-8 py-10 mt-24 max-w-lg text-center backdrop-blur">
                <h1 class="text-4xl font-bold text-orange-700 dark:text-orange-300 mb-4 drop-shadow">Selamat Datang di Senja Beach</h1>
                <p class="text-lg text-gray-700 dark:text-gray-200 mb-6">Nikmati suasana pantai dengan nuansa senja yang hangat dan menenangkan.  
                <br>Laravel Project Starter - Modern & Minimalis</p>
                <div class="flex justify-center gap-4">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="px-6 py-2 rounded-lg bg-orange-500 text-white font-semibold shadow hover:bg-orange-600 transition">Login</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2 rounded-lg bg-white/80 text-orange-700 font-semibold shadow hover:bg-orange-100 transition dark:bg-gray-800/80 dark:text-orange-300 dark:hover:bg-gray-900/80">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        // Parallax effect on scroll
        window.addEventListener('scroll', function() {
            const scrolled = window.scrollY;
            document.querySelectorAll('.parallax__layer--back').forEach(el => {
                el.style.transform = `translateY(${scrolled * 0.2}px) scale(2)`;
            });
            document.querySelectorAll('.parallax__layer--base').forEach(el => {
                el.style.transform = `translateY(${scrolled * 0.4}px)`;
            });
            document.querySelectorAll('.parallax__layer--front').forEach(el => {
                el.style.transform = `translateY(${scrolled * 0.6}px)`;
            });
        });
    </script>
</body>
</html>
