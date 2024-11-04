<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-6">
            <p class="text-sm text-gray-600">
                Antes de continuar, le solicitamos amablemente que complete sus datos personales.
            </p>
        </div>

        <form method="POST" action="{{ route('completar.datos') }}">
            @csrf

            <div>
                <x-label value="{{ __('Email') }}" />
                <x-input class="block mt-1 w-full" type="email" :value="old('email', $user->email)" class="bg-gray-100 text-gray-500"
                    disabled />
            </div>

            <div class="mt-5">
                <x-label for="name" value="{{ __('Nombres completos') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)"
                    required autofocus autocomplete="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-input class="block mt-1 w-full" type="text" name="telefono" id="telefono" :value="old('telefono', $user->telefono)"
                    required autocomplete="off" />
                <x-input-error for="telefono" class="mt-2" />
            </div>

            <x-button class="w-full mt-8 py-3 justify-center">
                {{ __('Completar registro') }}
            </x-button>

        </form>
    </x-authentication-card>
</x-guest-layout>
