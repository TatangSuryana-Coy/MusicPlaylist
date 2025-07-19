<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-200 via-purple-100 to-pink-100 font-sans">
    <div class="bg-white/80 rounded-2xl shadow-xl p-8 max-w-md w-full text-center backdrop-blur">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <h2 class="text-3xl font-bold text-purple-600 mb-6 drop-shadow">Login MusicProject</h2>
        <form wire:submit="login">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-purple-600" />
                <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full rounded-lg border-purple-300 focus:border-purple-500 focus:ring-purple-500" type="email" name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-purple-600" />
                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full rounded-lg border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 text-left">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-purple-300 text-purple-600 shadow-sm focus:ring-purple-500" name="remember">
                    <span class="ms-2 text-sm text-purple-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-purple-500 hover:text-purple-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-primary-button class="ms-3 bg-purple-500 hover:bg-purple-600 border-none">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>