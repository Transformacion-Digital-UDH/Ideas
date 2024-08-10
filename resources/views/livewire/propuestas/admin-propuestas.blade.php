<div class="relative overflow-x-auto">
    <table class=" table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">N°</th>
                <th scope="col" class="px-6 py-3">Necesidad / Propuesta</th>
                <th scope="col" class="px-6 py-3">Curación</th>
                <th scope="col" class="px-6 py-3">Tipo</th>
                <th scope="col" class="px-6 py-3 text-center">Estado</th>
                <th scope="col" class="px-6 py-3 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propuestas as $propuesta)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $propuesta->pro_id }}
                    </th>
                    <td class="px-6 py-4">
                        <strong class="text-gray-900">
                            {{ $propuesta->necesidad->nec_titulo }}
                        </strong>
                        <br>
                        {{ $propuesta->pro_titulo }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $propuesta->pro_created->format('Y-m-d') }}<br>
                        {{ $propuesta->pro_created->format('H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <b>{{ $propuesta->pro_tipo }}</b>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <x-estadoPropuesta :status="$propuesta->pro_proceso" />
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap">
                        @if ($propuesta->pro_tipo == 'Proyecto')
                            @role('VRI')
                                <button wire:click="abrirModalEditar({{ $propuesta->pro_id }})"
                                    class="middle px-2 py-1 bg-lime-600 border border-lime-600 text-lime-600 rounded-lg hover:bg-lime-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-edit text-white"></i>
                                </button>
                            @endrole
                        @elseif($propuesta->pro_tipo == 'Curso' || $propuesta->pro_tipo == 'Tesis')
                            @role('ESCUELA')
                                <button wire:click="abrirModalEditar({{ $propuesta->pro_id }})"
                                    class="middle px-2 py-1 bg-lime-600 border border-lime-600 text-lime-600 rounded-lg hover:bg-lime-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-edit text-white"></i>
                                </button>
                            @endrole
                        @endif
                        <button wire:click="abrirModalVer({{ $propuesta->pro_id }})"
                            class="middle px-2 py-1 bg-cyan-500 border text-cyan-600 rounded-lg hover:bg-cyan-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <i class="fas fa-eye text-white"></i>
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
