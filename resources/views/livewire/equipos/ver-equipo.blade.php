<div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            <h2 class="text-base">{{ $equipo->equ_nombre }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-gray-400 text-sm">{{ $equipo->equ_codigo }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="text-md font-bold text-sky-700">Detalles del equipo</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
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
                            <td class="px-6 py-4 whitespace-normal text-md ">
                                <x-estadoItem :status="$equipo->equ_estado" />
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Registrado el</td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ \Carbon\Carbon::parse($equipo->equ_created)->format('d/m/Y \a \l\a\s H:i') }}
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
