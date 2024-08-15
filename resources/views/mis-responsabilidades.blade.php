<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis responsabilidades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            @livewire('responsables.lista-necesidades')
        </div>
    </div>

    @livewire('responsables.ver-detalles')
    @livewire('responsables.enviar-correo')
</x-app-layout>
