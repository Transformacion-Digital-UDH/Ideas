<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-xl">{{ $propuesta->pro_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-gray-400 text-base">{{ $propuesta->pro_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="text-base font-bold">Detalles de la propuesta</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        @role('ESTUDIANTE|DOCENTE')
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Lugar</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">{{ $propuesta->pro_lugar }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Problema a tratar
                                </td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">{{ $propuesta->pro_tratar }}
                                </td>
                            </tr>
                        @endrole
                        @role('ESTUDIANTE')
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Beneficiarios</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $propuesta->pro_beneficiarios }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Causas</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">{{ $propuesta->pro_causas }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Consecuencias</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $propuesta->pro_consecuencias }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Aportes</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">{{ $propuesta->pro_aportes }}
                                </td>
                            </tr>
                        @endrole
                        @role('ESTUDIANTE|DOCENTE')
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Problemáticas</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $propuesta->problematicas }}</td>
                            </tr>
                        @endrole
                        @role('PROYECTISTA')
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Justificación</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $propuesta->pro_justificacion }}</td>
                            </tr>
                        @endrole
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Tipo</td>
                            <td class="px-6 py-4 whitespace-normal text-md ">
                                <span class="text-green-700 font-bold bg-green-100 py-1 px-4 rounded-lg">
                                    {{ $propuesta->pro_tipo }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Curador</td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ $propuesta->curador->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Fecha de
                                publicación</td>
                            <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                {{ \Carbon\Carbon::parse($propuesta->pro_created)->format('d/m/Y \a \l\a\s H:i') }}
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
            @role('PROYECTISTA|ESTUDIANTE|DOCENTE')
            @if ($mostrarBtnPostular)
                <x-button class="ml-2" wire:click="abrirModalPostular({{ $propuesta->pro_id }})"
                    wire:loading.attr="disabled">
                    Postular
                </x-button>
            @endif
            @endrole
        </x-slot>
    </x-dialog-modal>
</div>
