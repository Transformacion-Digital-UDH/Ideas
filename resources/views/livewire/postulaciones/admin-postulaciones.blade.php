<div>
    <div class="relative overflow-x-auto">
        @if ($propuestas->count() > 0)
            <table
                class="table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">N°</th>
                        <th scope="col" class="px-6 py-3">Propuesta</th>
                        <th scope="col" class="px-6 py-3">Cantidad</th>
                        <th scope="col" class="px-6 py-3">Tipo</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($propuestas->count() > 0)
                        @foreach ($propuestas as $i => $propuesta)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $propuestas->total() - $propuestas->perPage() * ($propuestas->currentPage() - 1) - $i }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $propuesta->pro_titulo }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <b
                                        class="bg-gray-200 px-2 py-1 rounded-full mr-2">{{ $propuesta->postulantes_count }}</b>
                                    Postulantes
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <b>{{ $propuesta->pro_tipo }}</b>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-estadoInterno :status="$propuesta->pro_proceso" />
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if ($propuesta->pro_tipo == 'Gestor UDH')
                                        @role('VRI')
                                            <x-button-icon class="px-2 h-7 bg-udh_3"
                                                wire:click="verPostulantes({{ $propuesta->pro_id }})"
                                                wire:loading.attr="disabled"
                                                wire:target="verPostulantes({{ $propuesta->pro_id }})">
                                                <span wire:loading wire:target="verPostulantes({{ $propuesta->pro_id }})">
                                                    <i class="fas fa-spinner fa-spin px-4"></i>
                                                </span>
                                                <span wire:loading.remove
                                                    wire:target="verPostulantes({{ $propuesta->pro_id }})">
                                                    Asignar
                                                </span>
                                            </x-button-icon>
                                            @elserole('ESCUELA')
                                            <x-button-icon class="px-2 h-7 bg-gray-400 cursor-not-allowed">
                                                Asignar
                                            </x-button-icon>
                                        @endrole
                                    @elseif($propuesta->pro_tipo == 'Curso' || $propuesta->pro_tipo == 'Tesis')
                                        @role('ESCUELA')
                                            <x-button-icon class="px-2 h-7 bg-udh_3"
                                                wire:click="verPostulantes({{ $propuesta->pro_id }})"
                                                wire:loading.attr="disabled"
                                                wire:target="verPostulantes({{ $propuesta->pro_id }})">
                                                <span wire:loading wire:target="verPostulantes({{ $propuesta->pro_id }})">
                                                    <i class="fas fa-spinner fa-spin px-4"></i>
                                                </span>
                                                <span wire:loading.remove
                                                    wire:target="verPostulantes({{ $propuesta->pro_id }})">
                                                    Asignar
                                                </span>
                                            </x-button-icon>
                                            @elserole('VRI')
                                            <x-button-icon class="px-2 h-7 bg-gray-400 cursor-not-allowed">
                                                Asignar
                                            </x-button-icon>
                                        @endrole
                                    @endif
                                    <x-button-icon class="px-2 h-7 bg-udh_1"
                                        wire:click="verPropuesta({{ $propuesta->pro_id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="verPropuesta({{ $propuesta->pro_id }})">
                                        <span wire:loading wire:target="verPropuesta({{ $propuesta->pro_id }})">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </span>
                                        <span wire:loading.remove wire:target="verPropuesta({{ $propuesta->pro_id }})">
                                            <i class="fas fa-eye text-white"></i>
                                        </span>
                                    </x-button-icon>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <x-empty-table colspan="6">
                            En este momento, no hay postulaciones. 😊
                        </x-empty-table>
                    @endif
                </tbody>
            </table>
        @else
            <div class="px-6 py-5 bg-white text-gray-600 font-medium">
                En este momento, no hay postulaciones disponibles. 😊
            </div>
        @endif
    </div>
    @if ($propuestas->hasPages())
        <div class="mt-4">
            {{ $propuestas->links() }}
        </div>
    @endif
</div>
