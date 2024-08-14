<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Needs') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-4">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="flex justify-between items-center pb-3">
                    <div></div> <!-- Espacio vacío para mantener la alineación -->
                    <x-input-buscar data-table="table_id" type="text" placeholder="Buscar..."
                        class="light-table-filter" />
                </div>
                @livewire('necesidades.lista-necesidades')
            </div>
        </div>
    </div>

    @livewire('necesidades.curar-necesidad')
    @livewire('necesidades.ver-necesidad')
    @livewire('componentes.BuscarEquipo')<!--por que es busqueda por tabla-->
</x-app-layout>
