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
            @livewire('crear-necesidad')
        </div>
           
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="relative overflow-x-auto">
                
                    <table class="table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">N°</th>
                                <th scope="col" class="px-6 py-3">Solicitante</th>
                                <th scope="col" class="px-6 py-3">Necesidad</th>
                                <th scope="col" class="px-6 py-3">Registro</th>
                                <th scope="col" class="px-6 py-3">Financiamiento</th>
                                <th scope="col" class="px-6 py-3 text-center">Estado</th>
                                <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($necesidades as $necesidad)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $necesidad->nec_id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <strong class="text-gray-900">{{ $necesidad->nec_tipo }}</strong>
                                        <br>{{ $necesidad->nec_entidad }}
                                        {{ $necesidad->solicitante }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $necesidad->nec_titulo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $necesidad->nec_created->format('Y-m-d') }}<br>
                                        {{ $necesidad->nec_created->format('H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        {{ $necesidad->es_financiado }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <x-com_proceso :status="$necesidad->nec_proceso" />
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <!--TODAVIA NO FUNCIONA PARA ABRIR EL MODAL Y EDITAR-->
                                        <button wire:click="abrirModal"
                                        class="middle px-4 py-2 bg-cyan-500 hover:bg-cyan-700 text-white rounded-lg mr-4 text-lg font-bold shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-50">
                                        editar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @livewire('componentes.buscar-necesidad-js')
</x-app-layout>
