<div>
    <div class="relative overflow-x-auto">
        <table
            class="table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">N°</th>
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Nombre/Tipo</th>
                    <th scope="col" class="px-6 py-3">Registro</th>
                    <th scope="col" class="px-6 py-3 text-center">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($equipos->count() > 0)
                    @foreach ($equipos as $equipo)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $equipo->equ_id }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $equipo->equ_codigo }}
                            </td>
                            <td class="px-6 py-4">
                                <strong class="text-gray-900">{{ $equipo->equ_nombre }}</strong>
                                <br>{{ $equipo->equ_tipo }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $equipo->equ_created->format('Y-m-d') }}<br>
                                {{ $equipo->equ_created->format('H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <x-estadoItem :status="$equipo->equ_estado" />
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <x-button-icon class="px-2 h-7 bg-udh_1" wire:loading.attr="disabled"
                                    wire:click="verEquipo({{ $equipo->equ_id }})">
                                    <i class="fa-solid fa-eye"></i>
                                </x-button-icon>
                                <x-button-icon class="px-2 h-7 bg-udh_3" wire:loading.attr="disabled"
                                    wire:click="editarEquipo({{ $equipo->equ_id }})">
                                    <i class="fa-solid fa-pencil"></i>
                                </x-button-icon>
                                <x-button-icon class="px-2 h-7 bg-red-600" wire:loading.attr="disabled"
                                    wire:click="eliminarEquipo({{ $equipo->equ_id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </x-button-icon>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <x-empty-table colspan="6">
                        Actualmente, no hay equipos registradas. 😊
                    </x-empty-table>
                @endif
            </tbody>
        </table>
    </div>

    @if ($equipos->hasPages())
        <div class="mt-4">
            {{ $equipos->links() }}
        </div>
    @endif
</div>
