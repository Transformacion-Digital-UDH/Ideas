<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="content">
            <div class="overflow-x-auto">
                <h3 class="font-bold text-md text-udh_1 mb-3">Detalles de la idea</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-gray-200">
                        @if ($postulacion->propuesta)
                            <tr class="border-b">
                                <td class="px-6 py-3 font-medium text-gray-800 whitespace-normal text-md">
                                    {{ $postulacion->propuesta->necesidad->nec_tipo == 'Ciudadano' ? 'DNI' : 'RUC' }}
                                </td>
                                <td class="px-6 py-3 text-gray-600 whitespace-normal text-md">
                                    {{ $postulacion->propuesta->necesidad->nec_documento ?? '' }}
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-3 font-medium text-gray-800 whitespace-normal text-md">
                                    {{ $postulacion->propuesta->necesidad->nec_tipo ?? '' }}
                                </td>
                                <td class="px-6 py-3 text-gray-600 whitespace-normal text-md">
                                    {{ $postulacion->propuesta->necesidad->nec_entidad ?? '' }}
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-3 font-medium text-gray-800 whitespace-normal text-md">
                                    Responsable
                                </td>
                                <td class="px-6 py-3 text-gray-600 whitespace-normal text-md">
                                    {{ $postulacion->propuesta->necesidad->responsable->name ?? 'POR DEFINIR' }}
                                    @isset($postulacion->propuesta->necesidad->responsable->email)
                                        <br> <b>Correo:</b>
                                        {{ $postulacion->propuesta->necesidad->responsable->email ?? '' }}
                                    @endisset
                                    @isset($postulacion->propuesta->necesidad->responsable->telefono)
                                        <br> <b>Teléfono:</b>
                                        {{ $postulacion->propuesta->necesidad->responsable->telefono ?? '' }}
                                    @endisset
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="overflow-x-auto mt-5">
                <h3 class="font-bold text-md text-udh_1">Detalles del proyecto</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($postulacion->propuesta)
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Propuesta</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    <p>{{ $postulacion->propuesta->pro_titulo }}</p>
                                    <p class="mt-2 font-semibold">Descripcion:</p>
                                    {{ $postulacion->propuesta->pro_descripcion }}
                                </td>
                            </tr>
                            @if ($postulacion->propuesta->pro_tipo == 'Curso' || $postulacion->propuesta->pro_tipo == 'Tesis')
                                @if ($postulacion->propuesta->pro_tipo == 'Curso')
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Lugar
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                            {{ $postulacion->propuesta->pro_lugar }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($postulacion->propuesta->pro_tipo == 'Tesis')
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Donde
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                            {{ $postulacion->propuesta->pro_lugar }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                            Quienes</td>
                                        <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                            {{ $postulacion->propuesta->pro_beneficiarios }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                            Problema
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                            {{ $postulacion->propuesta->problematicas }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Causas
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                            {{ $postulacion->propuesta->pro_causas }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                            Consecuencias</td>
                                        <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                            {{ $postulacion->propuesta->pro_consecuencias }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Aporte
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                            {{ $postulacion->propuesta->pro_aportes }}
                                        </td>
                                    </tr>
                                @endif
                            @elseif($postulacion->propuesta->pro_tipo == 'Gestor UDH')
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                        Justificación</td>
                                    <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                        {{ $postulacion->propuesta->pro_justificacion }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Estado</td>
                                <td class="px-6 py-4 whitespace-normal text-md ">
                                    <x-estadoInterno :status="$postulacion->propuesta->pro_proceso" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Tipo</td>
                                <td class="px-6 py-4 whitespace-normal text-md ">
                                    {{ $postulacion->propuesta->pro_tipo }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Curador</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $postulacion->propuesta->curador->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Fecha de
                                    publicación</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ \Carbon\Carbon::parse($postulacion->propuesta->pro_created)->format('d/m/Y \a \l\a\s H:i') }}
                                </td>
                            </tr>
                        @endif
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
