<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            <p><b class="text-udh_3">¡Gracias por registrarte!</b> Para comenzar verifica tu dirección de correo
                electrónico.</p>
            <p class="d-block pt-3">Por favor, <b class="text-udh_3">revisa tu bandeja de entrada</b> y haz clic en el
                enlace de verificación que te hemos enviado al correo <b
                    class="text-udh_3 font-bold">{{ auth()->user()->email }}</b>. Si no
                encuentras el correo, puedes solicitar que te enviemos otro.</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('Se ha enviado un nuevo enlace de verificación.') }}
            </div>
        @endif

        <div class="mt-6 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('SOLICITAR OTRO CORREO') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <button type="submit"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ms-2">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
