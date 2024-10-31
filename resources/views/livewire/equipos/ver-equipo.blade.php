<div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            <h2 class="text-base">Detalles de equipo</h2>
        </x-slot>

        <x-slot name="content">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                {{ $equipo->equ_tipo }}
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $equipo->equ_nombre }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Código
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $equipo->equ_codigo }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Tipo
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $equipo->equ_tipo }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Ciclo
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $equipo->equ_ciclo }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium
                             text-gray-800">Estado</td>
                            <td class="px-6 py-4 whitespace-normal text-base">
                                <x-estadoItem :status="$equipo->equ_estado" />
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Registrado el</td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ fechaHora($equipo->equ_created) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
