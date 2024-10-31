<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-base">{{ $propuesta->pro_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="text-sm">{{ $propuesta->pro_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="font-bold mt-3 text-udh_1">Detalles de la propuesta</h3>
                <table class="min-w-full bg-white">
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($propuesta->pro_tipo == 'Curso' || $propuesta->pro_tipo == 'Tesis')
                            @if ($propuesta->pro_tipo == 'Curso')
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Lugar de aplicación</td>
                                    <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                        {{ $propuesta->pro_lugar }}
                                    </td>
                                </tr>
                            @endif
                            @if ($propuesta->pro_tipo == 'Tesis')
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Donde</td>
                                    <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                        {{ $propuesta->pro_lugar }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                        Quienes</td>
                                    <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                        {{ $propuesta->pro_beneficiarios }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Problema
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                        {{ $propuesta->problematicas }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Causas
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                        {{ $propuesta->pro_causas }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">
                                        Consecuencias</td>
                                    <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                        {{ $propuesta->pro_consecuencias }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Aporte
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                        {{ $propuesta->pro_aportes }}
                                    </td>
                                </tr>
                            @endif
                        @elseif($propuesta->pro_tipo == 'Gestor UDH')
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Justificación
                                </td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $propuesta->pro_justificacion }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-normal text-md font-medium text-gray-800">Tipo de
                                    proyecto</td>
                                <td class="px-6 py-4 whitespace-normal text-md text-gray-600">
                                    {{ $propuesta->tipo_proyecto->tpro_nombre ?? 'N/A' }}</td>
                            </tr>
                        @endif
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

                @role('VRI|ESCUELA')
                    @if (!empty($asignado) || !empty($responsable))
                        <h3 class="font-bold mt-3 text-udh_1">Ejecutado por</h3>
                        <table class="min-w-full bg-white">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if (!empty($asignado))
                                    <tr>
                                        @if ($propuesta->pro_tipo == 'Tesis')
                                            <td class="px-6 py-4 font-medium text-gray-800">Tesista</td>
                                            <td class="px-6 py-4 text-gray-600">
                                                <p class="font-bold">{{ $asignado->postulante->name }}</p>
                                                <p>Correo: {{ $asignado->postulante->email }}</p>
                                                <p>Telefono: {{ $asignado->postulante->telefono }}</p>
                                            </td>
                                        @elseif($propuesta->pro_tipo == 'Gestor UDH')
                                            <td class="px-6 py-4 font-medium text-gray-800">Gestor UDH</td>
                                            <td class="px-6 py-4 text-gray-600">
                                                <p class="font-bold">{{ $asignado->postulante->name }}</p>
                                                <p>Correo: {{ $asignado->postulante->email }}</p>
                                                <p>Telefono: {{ $asignado->postulante->telefono }}</p>
                                            </td>
                                        @else
                                            <td class="px-6 py-4 font-medium text-gray-800">Curso</td>
                                            <td class="px-6 py-4 text-gray-600">
                                                <p class="font-bold">
                                                    {{ $asignado->equipo->equ_nombre . ' (' . $asignado->pos_seccion . ')' }}
                                                </p>
                                                <p>Docente: {{ $asignado->postulante->name }}</p>
                                                <p>Correo: {{ $asignado->postulante->email }}</p>
                                                <p>Telefono: {{ $asignado->postulante->telefono }}</p>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                                @if (!empty($responsable))
                                    <tr>
                                        <td class="px-6 py-4 text-gray-800">Responsable
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            <p class="font-bold">{{ $responsable->name }}</p>
                                            <p>Correo: {{ $responsable->email }}</p>
                                            <p>Telefono: {{ $responsable->telefono }}</p><br>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endif
                @endrole
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
