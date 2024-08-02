<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-base">{{ $necesidad->nec_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-gray-400 text-sm">{{ $necesidad->nec_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="text-md font-bold text-sky-700">Detalles de la necesidad</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                {{ $necesidad->nec_tipo }}
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $necesidad->nec_entidad }}
                                <x-input-error for="nec_entidad" />
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                {{ $necesidad->nec_tipo == 'Ciudadano' ? 'DNI' : 'RUC' }}
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $necesidad->nec_documento }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                ¿Es financiado?
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $necesidad->es_financiado }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Estado</td>
                            <td class="px-6 py-4 whitespace-normal text-md ">
                                <x-com_proceso :status="$necesidad->nec_proceso" />
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Registrado el</td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ \Carbon\Carbon::parse($necesidad->nec_created)->format('d/m/Y \a \l\a\s H:i') }}
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
    {{--------
    @livewire('necesidades.editar-necesidad')-------}}
</div>
