<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">

            <x-slot name="title">
                <h2 class="text-xl">{{ $postulantes->propuesta?->pro_titulo }}</h2>
            </x-slot>

            <x-slot name="content">
                <div class="mb-7">
                    <p class="mt-1 text-base text-gray-400">{{ $postulantes->propuesta?->pro_descripcion }}</p>
                </div>
                <div class="overflow-x-auto">
                    <h3 class="text-base font-bold">Detalles de la Postulacion</h3>
                    <table class="min-w-full bg-white">
                        <tbody class="bg-white divide-y divide-gray-200">

                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Justificacion</td>
                                    <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                        {{ $postulantes->pos_justificar }}</td>
                                </tr>

                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Asignado</td>
                                <td class="px-6 py-4 whitespace-normal text-md ">
                                    <span class="px-4 py-1 font-bold text-green-700 bg-green-100 rounded-lg">
                                        {{ $postulantes->pos_asignado }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Postulante</td>
                                <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                    {{ $postulantes->postulante->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Fecha de
                                    postulacion</td>
                                <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                    {{ \Carbon\Carbon::parse($postulantes->pos_created)->format('d/m/Y \a \l\a\s H:i') }}
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
