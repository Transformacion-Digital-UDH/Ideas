<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 text-center">
                {{ $value }}
            </div>
        @endsession

        <div class="text-center mb-5">
            <h1 class="block text-2xl font-bold text-udh_3">Iniciar sesión</h1>
            <p class="mt-3 text-sm text-gray-600">
                ¿Aún no tienes una cuenta?
                <a class="text-udh_1 hover:underline decoration-2 font-bold" href="{{ route('register') }}">
                    Registrate aquí
                </a>
            </p>
        </div>

        <a type="button" href="#"
            class="w-full py-2 px-3 inline-flex justify-center items-center gap-2 rounded-sm border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-white focus:ring-primary transition-all text-sm ">
            <img src="{{ asset('/google.webp') }}" class="w-4 h-4 mr-1" alt="google-img">
            Continuar con Google
        </a>
        <x-input-error for="google" class="mt-2" />

        <div class="w-full flex justify-between items-center">
            <hr class="my-7 h-px border-0 bg-gray-200 flex-1">
            <div class="bg-white text-gray-600 text-xs leading-[18px] px-2.5">O</div>
            <hr class="my-7 h-px border-0 bg-gray-200 flex-1">
        </div>


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-4">
                <div class="flex justify-between items-center">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <a class="text-sm text-udh_1 font-bold decoration-2 hover:underline"
                        href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
                </div>
                <div class="relative">
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error for="password" class="mt-2" />
                </div>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-3 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <x-button class="w-full mt-6 py-3 justify-center">
                {{ __('Log in') }}
            </x-button>
        </form>
    </x-authentication-card>
</x-guest-layout>
