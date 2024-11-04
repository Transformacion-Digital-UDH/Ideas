<div>
    <div class="relative overflow-x-auto">
        <table
            class="table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">N°</th>
                    <th scope="col" class="px-6 py-3">Proyectista</th>
                    <th scope="col" class="px-6 py-3">teléfono</th>
                    <th scope="col" class="px-6 py-3">Correo</th>
                    <th scope="col" class="px-6 py-3 text-center">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($proyectistas->count() > 0)
                    @foreach ($proyectistas as $i => $proyectista)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $proyectistas->total() - $i }}
                            </th>
                            <td class="px-6 py-4">
                                <span class="text-gray-900 font-medium">{{ $proyectista->name }}</span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $proyectista->telefono }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $proyectista->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <x-estadoItem :status="$proyectista->estado" />
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <x-button-icon class="px-2 h-7 bg-udh_1"
                                    wire:click="abrirModalVer({{ $proyectista->id }})" wire:loading.attr="disabled"
                                    wire:target="abrirModalVer({{ $proyectista->id }})">
                                    <span wire:loading wire:target="abrirModalVer({{ $proyectista->id }})">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                    <span wire:loading.remove wire:target="abrirModalVer({{ $proyectista->id }})">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                </x-button-icon>
                                <x-button-icon class="px-2 h-7 bg-udh_3" wire:click="abrirModal({{ $proyectista->id }})"
                                    wire:loading.attr="disabled" wire:target="abrirModal({{ $proyectista->id }})">
                                    <span wire:loading wire:target="abrirModal({{ $proyectista->id }})">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                    <span wire:loading.remove wire:target="abrirModal({{ $proyectista->id }})">
                                        <i class="fa-solid fa-pencil"></i>
                                    </span>
                                </x-button-icon>
                                <x-button-icon class="px-2 h-7 bg-red-600"
                                    wire:click="eliminarProyectista({{ $proyectista->id }})"
                                    wire:loading.attr="disabled"
                                    wire:target="eliminarProyectista({{ $proyectista->id }})">
                                    <span wire:loading wire:target="eliminarProyectista({{ $proyectista->id }})">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                    <span wire:loading.remove
                                        wire:target="eliminarProyectista({{ $proyectista->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </span>
                                </x-button-icon>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <x-empty-table colspan="6">
                        Actualmente, no hay proyectistas registradas. 😊
                    </x-empty-table>
                @endif
            </tbody>
        </table>
    </div>

    @if ($proyectistas->hasPages())
        <div class="mt-4">
            {{ $proyectistas->links() }}
        </div>
    @endif
</div>
