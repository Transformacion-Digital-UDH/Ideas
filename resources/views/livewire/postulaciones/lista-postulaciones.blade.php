<div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 ">
    <div class="relative overflow-x-auto w-full">
        <table
            class="w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">N°</th>
                    <th scope="col" class="px-6 py-3">Propuesta</th>
                    <th scope="col" class="px-6 py-3">Postulación</th>
                    <th scope="col" class="px-6 py-3">Tipo</th>
                    <th scope="col" class="px-6 py-3 text-center">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($postulaciones) > 0)
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
                            <td class="px-6 py-5 whitespace-nowrap text-center">
                                @if ($postulacion->pro_proceso != 'Postulación')
                                    <x-button-icon class="px-2 h-6 bg-udh_3 uppercase"
                                        wire:click="reportarEstado({{ $postulacion->propuesta->pro_id }})">
                                        Reportar
                                    </x-button-icon>
                                @endif
                                <x-button-icon class="px-1 h-6 w-6 bg-udh_1"
                                    wire:click="cargarVer({{ $postulacion->propuesta->pro_id }})">
                                    <i class="fas fa-eye"></i>
                                </x-button-icon>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="6" class="px-6 py-4">Usted no tiene postulaciones</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
