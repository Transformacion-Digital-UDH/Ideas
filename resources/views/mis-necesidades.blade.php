<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Ideas') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-4">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 px-4">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="pb-6 flex flex-col sm:flex-row justify-center sm:justify-between">
                    <div class="mb-4 sm:mb-0">
                        @livewire('necesidades.crear-necesidad')
                    </div>
                    {{-- <x-input-buscar data-table="table_id" type="text" placeholder="Buscar ..."
                        class="light-table-filter" /> --}}
                </div>

                @livewire('necesidades.card-necesidades')
            </div>
        </div>
    </div>

    @livewire('necesidades.ver-necesidad')
    @livewire('necesidades.editar-necesidad')
    @livewire('necesidades.eliminar-necesidad')
    @livewire('componentes.buscar-necesidad-js')
</x-app-layout>
