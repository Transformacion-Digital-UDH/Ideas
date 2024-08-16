<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-base">{{ $necesidad->nec_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-sm text-gray-400">{{ $necesidad->nec_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="font-bold text-md text-sky-700">Detalles de la necesidad</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                {{ $necesidad->nec_tipo }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                {{ $necesidad->nec_entidad }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                {{ $necesidad->nec_tipo == 'Ciudadano' ? 'DNI' : 'RUC' }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                {{ $necesidad->nec_documento }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                Correo
                            </td>
                            <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                {{ $necesidad->nec_email }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                Número de celular
                            </td>
                            <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                {{ $necesidad->nec_telefono }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                ¿Es financiado?
                            </td>
                            <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                {{ $necesidad->es_financiado }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Estado</td>
                            <td class="px-6 py-4 whitespace-normal text-md ">
                                <x-estadoInterno :status="$necesidad->nec_proceso" />
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Registrado el</td>
                            <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                {{ fechaHora($necesidad->nec_created) }}
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
