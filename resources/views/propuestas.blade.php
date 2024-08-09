<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Propuestas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            @role('VRI|ESCUELA')
                @livewire('propuestas.admin-propuestas')
            @endrole
            @role('DOCENTE|ESTUDIANTE|PROYECTISTA')
                @livewire('propuestas.lista-propuestas')
            @endrole
        </div>
    </div>

    @livewire('propuestas.ver-detalles')
    @livewire('propuestas.editar-propuesta')
    @livewire('propuestas.postular-propuesta')
</x-app-layout>
