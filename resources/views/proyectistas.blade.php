<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proyectistas') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-4">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="pb-3 flex justify-between">
                    <div>
                        @livewire('proyectistas.crear-proyectista')
                    </div>
                    <x-input-buscar data-table="table_id" type="text" placeholder="Buscar..."
                        class="light-table-filter " />

                </div>
                @livewire('proyectistas.lista-proyectistas')
            </div>
        </div>
    </div>

    @livewire('proyectistas.editar-proyectista')
    @livewire('proyectistas.ver-proyectista')
    @livewire('componentes.buscar-equipo')<!--por que es para busqueda de tabla-->
</x-app-layout>
