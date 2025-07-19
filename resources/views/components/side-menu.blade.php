<aside
    x-data="{ open: false }"
    x-modelable="open"
    :class="open ? 'translate-x-0' : '-translate-x-64'"
    class="fixed inset-y-0 left-0 z-50 w-64
        @if($theme === 'blue')
            bg-gradient-to-b from-blue-100 via-blue-200 to-blue-300 dark:from-blue-900 dark:via-blue-800 dark:to-blue-700 border-blue-200 dark:border-blue-800
        @elseif($theme === 'dark')
            bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 border-gray-800
        @else
            bg-gradient-to-b from-pink-100 via-pink-200 to-purple-100 dark:from-pink-900 dark:via-purple-900 dark:to-gray-900 border-pink-200 dark:border-pink-800
        @endif
        flex flex-col transition-transform duration-200 ease-in-out shadow-2xl
    "
>
    <!-- Toggle Button -->
    <button
        @click="open = !open; $dispatch('input', open)"
        class="absolute -right-4 top-4 z-50 flex items-center justify-center w-8 h-8 rounded-full bg-white/80 dark:bg-pink-900 border border-pink-200 dark:border-pink-700 shadow-lg hover:bg-pink-200 dark:hover:bg-pink-800 transition"
        aria-label="Toggle sidebar"
        type="button"
    >
        <svg x-show="open" class="w-5 h-5 text-pink-500 dark:text-pink-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        <svg x-show="!open" class="w-5 h-5 text-pink-500 dark:text-pink-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- Logo & User -->
    <div class="flex flex-col items-center h-28 px-6 border-b border-pink-200 dark:border-pink-800 bg-white/70 dark:bg-pink-950/70 relative">
        <div class="flex flex-col items-center mt-2">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'U') }}&background=F472B6&color=fff"
                 class="w-10 h-10 rounded-full border-2 border-pink-300 shadow" alt="User">
            <span class="text-xs text-pink-600 dark:text-pink-200 font-semibold mt-1">{{ Auth::user()->name ?? 'User' }}</span>
        </div>
    </div>
    
    <!-- Menu -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg
            @if($theme === 'blue')
                text-blue-700 dark:text-blue-200 hover:bg-blue-200 dark:hover:bg-blue-800
                {{ request()->routeIs('dashboard') ? 'bg-blue-200 dark:bg-blue-800 font-bold shadow' : '' }}
            @elseif($theme === 'dark')
                text-gray-200 hover:bg-gray-800
                {{ request()->routeIs('dashboard') ? 'bg-gray-800 font-bold shadow' : '' }}
            @else
                text-pink-700 dark:text-pink-200 hover:bg-pink-200 dark:hover:bg-pink-800
                {{ request()->routeIs('dashboard') ? 'bg-pink-200 dark:bg-pink-800 font-bold shadow' : '' }}
            @endif
            transition font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0H7m6 0h6"></path></svg>
            <span x-show="open">Dashboard</span>
        </a>
        <a href="{{ route('profile') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-pink-600 dark:text-pink-100 hover:bg-pink-100 dark:hover:bg-pink-900 transition font-medium {{ request()->routeIs('profile') ? 'bg-pink-100 dark:bg-pink-900 font-bold shadow' : '' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 20c0-4 4-7 8-7s8 3 8 7"/></svg>
            <span x-show="open">Profile</span>
        </a>
        <a href="{{ route('music.playlist') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-purple-700 dark:text-purple-200 hover:bg-purple-100 dark:hover:bg-purple-900 transition font-medium {{ request()->routeIs('music.playlist') ? 'bg-purple-100 dark:bg-purple-900 font-bold shadow' : '' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-2v13"></path>
                <circle cx="6" cy="18" r="3" />
                <circle cx="18" cy="16" r="3" />
            </svg>
            <span x-show="open">Music</span>
        </a>
        <a href="{{ route('settings.theme') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-pink-500 dark:text-pink-300 hover:bg-pink-100 dark:hover:bg-pink-900 transition font-medium {{ request()->routeIs('settings.theme') ? 'bg-pink-100 dark:bg-pink-900 font-bold shadow' : '' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
            </svg>
            <span x-show="open">Theme</span>
        </a>
    </nav>
    <!-- Footer/Logout -->
    <div class="px-4 pb-6">
        <form wire:submit.prevent="logout">
            <button type="submit"
                class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-pink-400 dark:text-pink-200 hover:bg-pink-100 dark:hover:bg-pink-900 transition font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"/>
                </svg>
                <span x-show="open">Logout</span>
            </button>
        </form>
    </div>
</aside>
