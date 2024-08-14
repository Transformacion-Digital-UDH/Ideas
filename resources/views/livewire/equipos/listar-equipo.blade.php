<div>
    <div class="relative overflow-x-auto">
        <table
            class="table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Nombre/Tipo</th>
                    <th scope="col" class="px-6 py-3">Registro</th>
                    <th scope="col" class="px-6 py-3 text-center">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                                wire:click="confirmDelete({{ $equipo->equ_id }})">
                                <i class="fa-solid fa-trash"></i>
                            </x-button-icon>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal de confirmación para eliminar-->
    
    <x-dialog-modal maxWidth="md" wire:model="showModal">
        <x-slot name="title">
            Confirmar Eliminación
        </x-slot>
        <x-slot name="content">
            ¿Estás seguro de eliminar este equipo?
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="eliminarEquipo"
                class="ml-2 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                Eliminar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
