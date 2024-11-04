<div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            <h2 class="text-base">Detalles del proyectista</h2>
        </x-slot>

        <x-slot name="content">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Nombre completo
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $proyectista->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Correo
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $proyectista->email }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Teléfono
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $proyectista->telefono }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Profesión
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $proyectista->profesion }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-normal text-md font-medium
                             text-gray-800">
                                Estado</td>
                            <td class="px-6 py-4 whitespace-normal text-base">
                                <x-estadoItem :status="$proyectista->estado" />
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Más detalles
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $proyectista->descripcion }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Registrado el</td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ fechaHora($proyectista->created_at) }}
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
