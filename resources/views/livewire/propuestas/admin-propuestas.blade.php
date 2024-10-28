<div>
    <div class="relative overflow-x-auto">
        <table
            class=" table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">N°</th>
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Idea / Propuesta</th>
                    <th scope="col" class="px-6 py-3">Curación</th>
                    <th scope="col" class="px-6 py-3">Tipo</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($propuestas->count() > 0)
                    @foreach ($propuestas as $propuesta)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $propuesta->pro_id }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $propuesta->pro_codigo }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $propuesta->necesidad->nec_titulo }}
                                <br>
                                <strong class="text-gray-900">
                                    {{ $propuesta->pro_titulo }}
                                </strong>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $propuesta->pro_created->format('Y-m-d') }}<br>
                                {{ $propuesta->pro_created->format('H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <b>{{ $propuesta->pro_tipo }}</b>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-estadoPropuesta :status="$propuesta->pro_proceso" />
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                @if ($propuesta->pro_tipo == 'Gestor UDH')
                                    @role('VRI')
                                        <x-button-icon class="px-2 h-7 bg-udh_3" wire:loading.attr="disabled"
                                            wire:click="abrirModalEditar({{ $propuesta->pro_id }})">
                                            <i class="fa-solid fa-pencil"></i>
                                        </x-button-icon>
                                        @elserole('ESCUELA')
                                        <x-button-icon class="px-2 h-7 bg-gray-400 cursor-not-allowed">
                                            <i class="fa-solid fa-pencil"></i>
                                        </x-button-icon>
                                    @endrole
                                @elseif($propuesta->pro_tipo == 'Curso' || $propuesta->pro_tipo == 'Tesis')
                                    @role('ESCUELA')
                                        <x-button-icon class="px-2 h-7 bg-udh_3" wire:loading.attr="disabled"
                                            wire:click="abrirModalEditar({{ $propuesta->pro_id }})">
                                            <i class="fa-solid fa-pencil"></i>
                                        </x-button-icon>
                                        @elserole('VRI')
                                        <x-button-icon class="px-2 h-7 bg-gray-400 cursor-not-allowed">
                                            <i class="fa-solid fa-pencil"></i>
                                        </x-button-icon>
                                    @endrole
                                @endif
                                <x-button-icon class="px-2 h-7 bg-udh_1" wire:loading.attr="disabled"
                                    wire:click='abrirModalVer({{ $propuesta->pro_id }})'>
                                    <i class="fas fa-eye text-white"></i>
                                </x-button-icon>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <x-empty-table colspan="7">
                        Por el momento, no hay propuestas. 😊
                    </x-empty-table>
                @endif
            </tbody>
        </table>
    </div>

    @if ($propuestas->hasPages())
        <div class="mt-4">
            {{ $propuestas->links() }}
        </div>
    @endif
</div>
