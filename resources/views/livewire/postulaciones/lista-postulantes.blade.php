<div class="mx-auto max-w-screen-2xl sm:px-6 lg:px-8 ">
    <div class="relative w-full overflow-x-auto">
        <table
            class="w-full overflow-hidden text-sm text-left bg-white rounded-lg shadow-xl rtl:text-right dark:bg-gray-800">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">N°</th>
                    <th scope="col" class="px-6 py-3">Propuesta</th>
                    <th scope="col" class="px-6 py-3">Postulación</th>
                    <th scope="col" class="px-6 py-3 text-center">Estado</th>
                    <th scope="col" class="px-6 py-3">Tipo</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($postulantes) > 0)
                    @foreach ($postulantes as $i => $postulacion)
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
                            <td class="px-6 py-5 text-center whitespace-nowrap">
                                <x-estadoPostulacion :status="$postulacion->estado" />
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                {{ $postulacion->propuesta->pro_tipo }} {{$postulacion->propuesta->pro_id}}
                            </td>
                            <td class="px-6 py-5 text-center whitespace-nowrap">
                                <button wire:click="abrirModalVer({{ $postulacion->propuesta->pro_id }})"
                                    class="px-2 py-1 transition duration-300 ease-in-out transform border rounded-lg middle bg-cyan-500 text-cyan-600 hover:bg-cyan-600 hover:text-white hover:-translate-y-1 hover:scale-105">
                                    <i class="text-white fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="6" class="px-6 py-4">Usted no tiene postulantes</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
