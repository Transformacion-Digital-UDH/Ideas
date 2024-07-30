<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Propuestas') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="relative overflow-x-auto">
                    <table
                        class="w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">N°</th>
                                <th scope="col" class="px-6 py-3">Propuesta</th>
                                <th scope="col" class="px-6 py-3">Propuesta</th>
                                <th scope="col" class="px-6 py-3">Registro</th>
                                <th scope="col" class="px-6 py-3">Financiamiento</th>
                                <th scope="col" class="px-6 py-3 text-center">Estado</th>
                                <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($propuestas as $propuesta)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $propuesta->pro_id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <strong class="text-gray-900">{{ $propuesta->nec_tipo }}</strong>
                                        <br>{{ $propuesta->nec_entidad }}
                                        {{ $propuesta->solicitante }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $propuesta->nec_titulo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $propuesta->pro_created->format('Y-m-d') }}<br>
                                        {{ $propuesta->pro_created->format('H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        {{ $propuesta->es_financiado }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <x-com_proceso :status="$propuesta->nec_proceso" />
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <button
                                            class="middle px-2 py-1 bg-transparent border border-lime-600 text-lime-600 rounded-lg hover:bg-lime-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                            Curar
                                        </button>
                                        <button
                                            class="middle px-2 py-1 bg-cyan-500 border text-cyan-600 rounded-lg hover:bg-cyan-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                            <i class="fas fa-eye text-white"></i>
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
</x-app-layout>
