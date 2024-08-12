<div>
    <x-dialog-modal wire:model="showModal" maxWidth="md">
        <x-slot name="title">
            <h2 class="text-base">Detalles del Proyectista</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-gray-400 text-sm">{{ $proyectista->name }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="text-md font-bold text-sky-700">Detalles del Proyectista</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Nombre Completo
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $proyectista->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Email
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
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                Más detalles
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $proyectista->descripcion }}
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
