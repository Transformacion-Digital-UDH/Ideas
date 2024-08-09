<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="text-center mb-5">
            <h1 class="block text-xl font-bold text-udh_3">¿Olvidó su contraseña?</h1>
        </div>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('No hay problema. Ingresa tu correo electrónico y te enviaremos un enlace para que la restablezcas y elijas una nueva.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-5">
                <a class="text-udh_1 hover:underline decoration-2 font-bold" href="{{ route('login') }}">
                    {{ __('Log in') }}
                </a>
                <x-button>
                    {{ __('Restored') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
