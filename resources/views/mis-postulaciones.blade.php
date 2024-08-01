<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis postulaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            @role('DOCENTE|ESTUDIANTE')
                @livewire('postulaciones.lista-postulaciones')
            @endrole
        </div>
    </div>

    @livewire('propuestas.ver-detalles')
</x-app-layout>


