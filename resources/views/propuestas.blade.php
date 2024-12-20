<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Propuestas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            @role('VRI|ESCUELA')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <div class="flex justify-between items-center pb-3">
                        <div></div> <!-- Espacio vacío para mantener la alineación -->
                        <x-input-buscar data-table="table_id" type="text" placeholder="Buscar..."
                            class="light-table-filter" />
                    </div>
                    @livewire('propuestas.admin-propuestas')
                </div>
            @endrole
            @role('DOCENTE|ESTUDIANTE|PROYECTISTA')
                <div class="flex justify-center items-center pb-10">
                    <x-input-buscar type="text" placeholder="Buscar propuestas..."
                        class="light-table-filter w-full max-w-2xl" />
                </div>
                @livewire('propuestas.lista-propuestas')
            </div>
        @endrole
    </div>
    </div>

    @livewire('propuestas.ver-detalles')
    @livewire('propuestas.editar-propuesta')
    @livewire('propuestas.postular-propuesta')
    @livewire('componentes.BuscarEquipo')<!--por que es busqueda por tabla-->
    @livewire('componentes.BuscarNecesidadJs')<!--por que es busqueda por card-->
</x-app-layout>
