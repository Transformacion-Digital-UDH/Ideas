<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Postulaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                @livewire('postulaciones.admin-postulaciones')
            </div>
        </div>
    </div>
    @livewire('propuestas.ver-detalles')
    @livewire('postulaciones.asignar-postulante')
</x-app-layout>
