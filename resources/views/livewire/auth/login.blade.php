<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<!-- Root element for Livewire -->
<div class="min-h-screen relative">

    <!-- Back button fixed top-right corner, above all elements -->
    <div class="fixed top-0 right-0 z-[9999]">
        <flux:button type="button" onclick="window.history.back()"
            class="text-gray-700 border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100 m-1">
            {{ __('←') }}
        </flux:button>
    </div>

    <!-- Main content centered -->
    <div class="flex flex-col gap-6 max-w-md mx-auto px-4 py-6 min-h-[600px] mt-28">

        <x-auth-header :title="__('Inicie sesión en su cuenta')" :description="__('Ingrese su correo electrónico y contraseña a continuación para iniciar sesión')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form wire:submit="login" class="flex flex-col gap-6">

            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Correo electrónico')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="nombre@gmail.com"
            />

            <!-- Password -->
            <flux:input
                wire:model="password"
                :label="__('Contraseña')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Contraseña')"
                viewable
            />

            <div class="flex items-center justify-between mt-1 mb-4">
                <!-- Remember Me -->
                <flux:checkbox wire:model="remember" :label="__('Recuérdame')" class="flex-shrink-0" />

                @if (Route::has('password.request'))
                    <flux:link :href="route('password.request')" wire:navigate
                        class="text-sm text-white hover:underline ml-4">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </flux:link>
                @endif
            </div>

            <div class="flex items-center justify-end gap-4">
                <flux:button variant="primary" type="submit" class="w-full">
                    {{ __('Iniciar sesión') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400 mt-2">
                {{ __('¿No tienes una cuenta?') }}
                <flux:link :href="route('register')" wire:navigate>{{ __('Regístrate') }}</flux:link>
            </div>
        @endif

    </div>
</div>

