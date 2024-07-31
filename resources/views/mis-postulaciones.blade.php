<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis postulaciones') }}
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
                                <th scope="col" class="px-6 py-3">Postulación</th>
                                <th scope="col" class="px-6 py-3">Tipo</th>
                                <th scope="col" class="px-6 py-3 text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postulaciones as $i => $postulacion)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $i + 1 }}
                                    </th>
                                    <td class="px-6 py-5">
                                        <strong class="text-gray-900">{{ $postulacion->propuesta->pro_titulo }}</strong>
                                    </td>
                                    <td class="px-6 py-5">
                                        {{ $postulacion->pos_created->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap">
                                        {{ $postulacion->propuesta->pro_tipo }}
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap text-center">
                                        <x-estadoPostulacion :status="$postulacion->estado" />
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
