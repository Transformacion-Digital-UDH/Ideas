<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis necesidades') }}
        </h2>
        <div class="flex justify-center items-center mt-6">
            <div class="relative justify-center items-center FL p-1 border border-gray-200 rounded-lg w-full max-w-lg">
                <div class="relative flex items-center">
                    <input data-table="table_id" type="text" placeholder="Buscar..."
                        class="light-table-filter block w-full py-1.5 pr-5
                            text-gray-700 bg-white border border-gray-200 rounded-lg placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5
                            focus:border-sky-400 focus:ring-sky-300 focus:outline-none focus:ring focus:ring-opacity-40">
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 space-y-4">
        <div class="">
            @livewire('necesidades.crear-necesidad')
        </div>

        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="relative overflow-x-auto">
                    @livewire('necesidades.card-necesidades')
                </div>
            </div>
        </div>
    </div>

    @livewire('necesidades.ver-necesidad')
    @livewire('necesidades.editar-necesidad')
    @livewire('componentes.buscar-necesidad-js')
</x-app-layout>
