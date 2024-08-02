<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Equipos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="container mx-auto my-4">
                    @livewire('componentes.buscar-equipo')
                </div>
                @livewire('equipos.listar-equipo')
            </div>
        </div>
    </div>

    @livewire('equipos.editar-equipo')
    @livewire('equipos.ver-equipo')

</x-app-layout>
