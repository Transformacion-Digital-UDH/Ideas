<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="text-center mb-5">
            <h1 class="block text-2xl font-bold text-udh_3">{{ __('Register') }}</h1>
            <p class="mt-3 text-sm text-gray-600">
                ¿Ya tienes una cuenta?
                <a class="text-udh_1 hover:underline decoration-2 font-bold" href="{{ route('login') }}">
                    Inicia sesión aquí
                </a>
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error for="password" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error for="password_confirmation" class="mt-2" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-3 text-sm">
                                Al registrame, acepto los
                                <a target="_blank" href="{{ route('terms.show') }}"
                                    class="underline text-gray-600 hover:text-udh_1 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-udh_1">
                                    {{ __('Terms of Use') }}
                                </a> y la
                                <a target="_blank" href="{{ route('policy.show') }}"
                                    class="underline text-gray-600 hover:text-udh_1 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-udh_1">
                                    {{ __('Privacy Policy') }}
                                </a>.
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <x-button class="w-full mt-6 py-3 justify-center">
                {{ __('Register') }}
            </x-button>
        </form>
    </x-authentication-card>
</x-guest-layout>
