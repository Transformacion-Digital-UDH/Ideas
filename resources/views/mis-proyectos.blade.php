<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 px-4">
            @livewire('proyectos.lista-proyectos')
        </div>
    </div>

    @livewire('proyectos.ver-responsable')
    @livewire('proyectos.ver-proyecto')
    @livewire('proyectos.ver-propuestas')
    @livewire('proyectos.reportar-avance')
    @livewire('necesidades.enviar-correo')
</x-app-layout>
