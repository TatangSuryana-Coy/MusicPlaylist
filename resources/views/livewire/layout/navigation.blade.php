<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false, dropdown: false }" class="sticky top-0 z-50 bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo & Nav -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" wire:navigate>
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-100" />
                </a>
                @php
                    $menus = [
                        ['route' => 'dashboard', 'label' => 'Dashboard'],
                        ['route' => 'profile', 'label' => 'Profile'],
                        ['route' => 'music.playlist', 'label' => 'Music'], // Tambahkan menu Music di sini
                        // Tambahkan menu lain di sini
                    ];
                @endphp

                @foreach ($menus as $menu)
                    @if (request()->routeIs($menu['route']))
                        <x-nav-link
                            :href="route($menu['route'])"
                            :active="true"
                            wire:navigate
                            class="text-gray-700 dark:text-gray-200"
                        >
                            {{ __($menu['label']) }}
                        </x-nav-link>
                    @endif
                @endforeach
            </div>

            <!-- Actions: Profile Dropdown & Dark Mode -->
            <div class="flex items-center space-x-2">
                <!-- Dark Mode Toggle -->
                <button
                    x-data="{
                        dark: @json(auth()->user()->dark_mode),
                        async toggle() {
                            this.dark = !this.dark;
                            if (this.dark) {
                                document.documentElement.classList.add('dark');
                            } else {
                                document.documentElement.classList.remove('dark');
                            }
                            await fetch('/user/dark-mode', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ dark_mode: this.dark ? 1 : 0 })
                            });
                        }
                    }"
                    x-init="if (dark) { document.documentElement.classList.add('dark'); }"
                    :aria-pressed="dark"
                    @click="toggle()"
                    class="relative w-10 h-6 bg-gray-200 dark:bg-gray-700 rounded-full transition-colors duration-300 focus:outline-none"
                >
                    <span
                        :class="dark ? 'translate-x-4 bg-gray-900' : 'translate-x-0 bg-white'"
                        class="absolute left-0 top-0 w-6 h-6 rounded-full shadow transform transition-transform duration-300"
                    ></span>
                    <svg x-show="!dark" class="absolute left-1 top-1 w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15a5 5 0 100-10 5 5 0 000 10z"/></svg>
                    <svg x-show="dark" class="absolute right-1 top-1 w-4 h-4 text-gray-200" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/></svg>
                </button>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ dropdown: false }">
                    <button @click="dropdown = !dropdown"
                        class="flex items-center gap-2 px-3 py-2 rounded-md text-gray-700 dark:text-gray-200 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none transition"
                        aria-haspopup="true" :aria-expanded="dropdown">
                        <span x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name"></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div
                        x-show="dropdown"
                        @click.away="dropdown = false"
                        @keydown.escape.window="dropdown = false"
                        class="absolute right-0 mt-2 w-44 rounded-md shadow-lg z-50 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 py-1"
                        x-transition
                        style="display: none;"
                    >
                        <a href="{{ route('profile') }}"
                           wire:navigate
                           class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 transition rounded"
                        >
                            {{ __('Profile') }}
                        </a>
                        <form wire:submit.prevent="logout">
                            <button type="submit"
                                class="block w-full text-start px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 transition rounded"
                            >
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="text-gray-700 dark:text-gray-200">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-100">{{ auth()->user()->name }}</div>
                <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate class="dark:text-gray-200">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form wire:submit.prevent="logout">
                    <button type="submit" class="w-full text-start">
                        <x-responsive-nav-link class="dark:text-gray-200">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
