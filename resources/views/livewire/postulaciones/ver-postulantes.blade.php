<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-xl">{{ $postulantes->propuesta }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-gray-400 text-base">{{ $postulantes->propuesta }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="text-base font-bold">Detalles de la Postulacion</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if($postulantes->pos_tipo == 'Curso' || $postulantes->pos_tipo == 'Tesis')
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Lugar</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">{{ $postulantes->pos_lugar }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">posblemáticas</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $postulantes->posblematicas }}</td>
                            </tr>
                            @if($postulantes->pos_tipo == 'Tesis')
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Beneficiarios</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $postulantes->pos_beneficiarios }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Causas</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">{{ $postulantes->pos_causas }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Consecuencias</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $postulantes->pos_consecuencias }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Aportes</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">{{ $postulantes->pos_aportes }}
                                </td>
                            </tr>
                            
                            @endif
                        @elseif($postulantes->pos_tipo == 'posyecto')
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Justificación</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $postulantes->pos_justificacion }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Tipo</td>
                            <td class="px-6 py-4 whitespace-normal text-md ">
                                <span class="text-green-700 font-bold bg-green-100 py-1 px-4 rounded-lg">
                                    {{ $postulantes->pos_tipo }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Curador</td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $postulantes->curador->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Fecha de
                                publicación</td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
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
