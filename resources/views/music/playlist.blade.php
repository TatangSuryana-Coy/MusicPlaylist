<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-pink-100 via-pink-200 to-pink-300 dark:from-pink-900 dark:via-pink-800 dark:to-pink-700 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 dark:bg-pink-950/80 shadow-xl rounded-3xl p-8 backdrop-blur border-4 border-pink-200 dark:border-pink-800 relative overflow-hidden">
                <!-- Ornamen lucu -->
                <div class="absolute -top-8 -left-8">
                    <span class="text-pink-300 text-7xl animate-bounce">🎀</span>
                </div>
                <div class="absolute -bottom-8 -right-8">
                    <span class="text-pink-200 text-7xl animate-spin-slow">🍬</span>
                </div>
                <h3 class="text-3xl font-extrabold text-pink-500 dark:text-pink-300 mb-6 text-center drop-shadow-pink">Senja Beach Playlist</h3>
                <div class="mb-8 flex justify-center">
                    <form action="{{ route('music.upload') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
                        @csrf
                        <label class="cursor-pointer flex items-center gap-2 text-pink-500 dark:text-pink-200 hover:text-pink-700 dark:hover:text-pink-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" />
                            </svg>
                            <span class="text-base font-semibold">Upload Musik</span>
                            <input type="file" name="music" accept="audio/mp3,audio/mpeg" required class="hidden" onchange="this.form.submit()">
                        </label>
                    </form>
                </div>
                <div class="mb-2 w-full md:w-96 mx-auto overflow-hidden">
                    <div id="current-title" class="whitespace-nowrap text-center text-base font-bold text-pink-600 dark:text-pink-200 animate-marquee" style="animation: marquee 10s linear infinite;">
                        {{ count($songs) ? '🎵 '.$songs->first()['name'] : '' }}
                    </div>
                    <!-- Kontrol Musik Modern & Minimalis -->
                    <div class="flex justify-center gap-3 my-4">
                        <button id="prev-btn" title="Previous"
                            class="song-control rounded-full w-12 h-12 flex items-center justify-center bg-pink-100 dark:bg-pink-800 shadow hover:bg-pink-200 dark:hover:bg-pink-700 transition border-2 border-pink-300 dark:border-pink-700">
                            <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <!-- Ganti tombol play/pause -->
                        <button id="play-btn" title="Play/Pause"
                            class="song-control rounded-full w-14 h-14 flex items-center justify-center bg-pink-400 text-white shadow-lg hover:bg-pink-500 transition border-4 border-pink-200 dark:border-pink-600">
                            <svg id="play-icon" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polygon points="8,5 19,12 8,19" fill="currentColor" />
                            </svg>
                            <svg id="pause-icon" class="w-8 h-8 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="6" y="5" width="4" height="14" rx="1" fill="currentColor"/>
                                <rect x="14" y="5" width="4" height="14" rx="1" fill="currentColor"/>
                            </svg>
                        </button>
                        <button id="next-btn" title="Next"
                            class="song-control rounded-full w-12 h-12 flex items-center justify-center bg-pink-100 dark:bg-pink-800 shadow hover:bg-pink-200 dark:hover:bg-pink-700 transition border-2 border-pink-300 dark:border-pink-700">
                            <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        <button id="random-btn" title="Random"
                            class="song-control rounded-full w-12 h-12 flex items-center justify-center bg-pink-100 dark:bg-pink-800 shadow hover:bg-pink-200 dark:hover:bg-pink-700 transition border-2 border-pink-300 dark:border-pink-700">
                            <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v6h6M20 20v-6h-6M20 4l-8.5 8.5M4 20l8.5-8.5" />
                            </svg>
                        </button>
                        <button id="repeat-btn" title="Repeat"
                            class="song-control rounded-full w-12 h-12 flex items-center justify-center bg-pink-100 dark:bg-pink-800 shadow hover:bg-pink-200 dark:hover:bg-pink-700 transition border-2 border-pink-300 dark:border-pink-700">
                            <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v6h6M20 20v-6h-6M4 20c0-4.418 3.582-8 8-8s8 3.582 8 8" />
                            </svg>
                        </button>
                    </div>
                    <!-- Audio player tanpa kontrol default -->
                    <audio id="audio-player" class="w-full mt-4 rounded-xl border-2 border-pink-200 dark:border-pink-700 bg-pink-50 dark:bg-pink-900"></audio>
                </div>

                @if(count($songs))
                    <ul class="space-y-2 mb-8">
                        @foreach($songs as $song)
                            <li>
                                <button type="button"
                                    class="song-btn text-left w-full px-4 py-2 rounded-xl transition font-semibold text-pink-600 dark:text-pink-200 bg-pink-50 dark:bg-pink-900 hover:bg-pink-200 dark:hover:bg-pink-800 flex items-center gap-2 shadow-sm border border-pink-200 dark:border-pink-800"
                                    data-url="{{ $song['url'] }}"
                                    onclick="playSong('{{ $song['url'] }}', '{{ addslashes($song['name']) }}', this)">
                                    <span class="equalizer hidden" aria-label="Now playing">
                                        <svg width="18" height="18" viewBox="0 0 18 18" class="inline" fill="none">
                                            <rect class="bar bar1" x="2" y="6" width="2" height="6" rx="1" fill="#fb923c">
                                                <animate attributeName="height" values="6;12;6" dur="0.7s" repeatCount="indefinite"/>
                                                <animate attributeName="y" values="6;3;6" dur="0.7s" repeatCount="indefinite"/>
                                            </rect>
                                            <rect class="bar bar2" x="7" y="3" width="2" height="12" rx="1" fill="#fb923c">
                                                <animate attributeName="height" values="12;6;12" dur="0.7s" repeatCount="indefinite"/>
                                                <animate attributeName="y" values="3;6;3" dur="0.7s" repeatCount="indefinite"/>
                                            </rect>
                                            <rect class="bar bar3" x="12" y="6" width="2" height="6" rx="1" fill="#fb923c">
                                                <animate attributeName="height" values="6;12;6" dur="0.7s" repeatCount="indefinite"/>
                                                <animate attributeName="y" values="6,3,6" dur="0.7s" repeatCount="indefinite"/>
                                            </rect>
                                        </svg>
                                    </span>
                                    <span class="text-pink-500 dark:text-pink-300">🎵 {{ $song['name'] }}</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center text-pink-400 dark:text-pink-200 py-12">
                        Tidak ada lagu di playlist.<br>
                        Upload file mp3 ke <code class="bg-pink-100 dark:bg-pink-900 px-1 rounded">storage/app/public/music/</code>.
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>

<style>
@keyframes marquee {
  0%   { transform: translateX(100%);}
  100% { transform: translateX(-100%);}
}
.animate-marquee {
  display: inline-block;
  min-width: 100%;
  animation: marquee 10s linear infinite;
}
#current-title {
  opacity: 1;
  transition: opacity 0.4s;
}
#current-title.fade-out {
  opacity: 0;
}
/* Animasi pelan untuk ornamen */
@keyframes spin-slow {
  0% { transform: rotate(0deg);}
  100% { transform: rotate(360deg);}
}
.animate-spin-slow {
  animation: spin-slow 8s linear infinite;
}
/* Drop shadow pink untuk judul */
.drop-shadow-pink {
  filter: drop-shadow(0 2px 8px #f472b6);
}
</style>

<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Plyr (opsional, jika ingin tampilan modern)
    const player = new Plyr('#audio-player', {
        controls: []
    });

    // Ambil elemen kontrol
    const playBtn = document.getElementById('play-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const randomBtn = document.getElementById('random-btn');
    const repeatBtn = document.getElementById('repeat-btn');
    const audio = document.getElementById('audio-player');
    const playIcon = document.getElementById('play-icon');
    const pauseIcon = document.getElementById('pause-icon');
    let isRandom = false;
    let isRepeat = false;

    // Play/Pause handler
    playBtn.addEventListener('click', function() {
        if (audio.paused) {
            audio.play();
        } else {
            audio.pause();
        }
    });

    // Next song handler
    nextBtn.addEventListener('click', function() {
        playNextSong();
    });

    // Previous song handler
    prevBtn.addEventListener('click', function() {
        playPrevSong();
    });

    // Random toggle handler
    randomBtn.addEventListener('click', function() {
        isRandom = !isRandom;
        randomBtn.classList.toggle('ring-2', isRandom);
    });

    // Repeat toggle handler
    repeatBtn.addEventListener('click', function() {
        isRepeat = !isRepeat;
        repeatBtn.classList.toggle('ring-2', isRepeat);
        audio.loop = isRepeat;
    });

    // Update play/pause icon otomatis
    audio.addEventListener('play', () => {
        playIcon.classList.add('hidden');
        pauseIcon.classList.remove('hidden');
    });
    audio.addEventListener('pause', () => {
        playIcon.classList.remove('hidden');
        pauseIcon.classList.add('hidden');
    });

    // Autoplay next song saat lagu selesai
    audio.addEventListener('ended', function() {
        if (isRepeat) {
            audio.currentTime = 0;
            audio.play();
            return;
        }
        if (isRandom) {
            playRandomSong();
        } else {
            playNextSong();
        }
    });
});

/**
 * Fungsi untuk memutar lagu tertentu
 */
function playSong(url, name, btn) {
    // Animasi judul
    const title = document.getElementById('current-title');
    title.classList.add('fade-out');
    setTimeout(() => {
        title.textContent = '🎵 ' + name;
        title.classList.remove('fade-out');
    }, 400);

    // Equalizer aktif hanya di tombol aktif
    document.querySelectorAll('.equalizer').forEach(eq => eq.classList.add('hidden'));
    btn.querySelector('.equalizer').classList.remove('hidden');

    // Highlight tombol aktif
    btn.closest('ul').querySelectorAll('button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Set dan play audio
    const audio = document.getElementById('audio-player');
    audio.src = url;
    audio.play();
}

/**
 * Fungsi untuk memutar lagu berikutnya
 */
function playNextSong() {
    const activeBtn = document.querySelector('.song-btn.active');
    let nextLi = activeBtn ? activeBtn.closest('li').nextElementSibling : null;
    if (window.isRandom) {
        playRandomSong();
    } else if (nextLi) {
        const nextBtn = nextLi.querySelector('.song-btn');
        if (nextBtn) nextBtn.click();
    }
}

/**
 * Fungsi untuk memutar lagu sebelumnya
 */
function playPrevSong() {
    const activeBtn = document.querySelector('.song-btn.active');
    const prevLi = activeBtn ? activeBtn.closest('li').previousElementSibling : null;
    if (prevLi) {
        const prevBtn = prevLi.querySelector('.song-btn');
        if (prevBtn) prevBtn.click();
    }
}

/**
 * Fungsi untuk memutar lagu secara acak
 */
function playRandomSong() {
    const buttons = Array.from(document.querySelectorAll('.song-btn'));
    const activeBtn = document.querySelector('.song-btn.active');
    const idx = buttons.indexOf(activeBtn);
    let randIdx;
    do {
        randIdx = Math.floor(Math.random() * buttons.length);
    } while (buttons.length > 1 && randIdx === idx);
    buttons[randIdx].click();
}
</script>