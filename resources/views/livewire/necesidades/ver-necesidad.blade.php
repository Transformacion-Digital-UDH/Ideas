<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-base">{{ $necesidad->nec_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="text-sm">{{ $necesidad->nec_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="font-bold text-md text-udh_1">Detalles de la idea</h3>
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
                                Dirección
                            </td>
                            <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                {{ $necesidad->nec_direccion }}
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
                                @role('SOCIEDAD|PROYECTISTA|DOCENTE|ESTUDIANTE')
                                    <x-estadoSociedad :status="$necesidad->nec_proceso" />
                                @endrole
                                @role('VRI|ESCUELA')
                                    <x-estadoInterno :status="$necesidad->nec_proceso" />
                                @endrole
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Registrado el</td>
                            <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                {{ fechaHora($necesidad->nec_created) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800">Responsable
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                @if (!empty($necesidad->responsable))
                                    <p class="font-bold">{{ $necesidad->responsable->name }}</p>
                                    <p>Correo: {{ $necesidad->responsable->email }}</p>
                                    <p>Telefono: {{ $necesidad->responsable->telefono }}</p><br>
                                @else
                                    <p class="font-bold">Por asignar</p>
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
                @role('VRI|ESCUELA')
                    <h3 class="font-bold text-md text-udh_1">Propuestas</h3>
                    @if (count($necesidad->propuestas) > 0)
                        @foreach ($necesidad->propuestas as $propuesta)
                            <div class="px-3 py-2 my-3 border border-gray-300">
                                @if ($propuesta->es_oficial)
                                    <span class="text-white text-xs rounded-md bg-udh_1 px-2 py-1 block mb-1 max-w-max">
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                        Proyecto oficial
                                    </span>
                                @endif
                                <p>{{ $propuesta->pro_titulo }}</p>
                                <div class="flex items-center justify-between">
                                    <b>{{ $propuesta->pro_tipo }}</b>
                                    <x-estadoPropuesta :status="$propuesta->pro_proceso" />
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="mt-2 text-sm">No hay propuestas para esta idea.</p>
                    @endif
                @endrole
                @if (count($documentos) > 0)
                    <h3 class="pt-5 font-bold text-md text-udh_1">Documentos</h3>
                    @foreach ($documentos as $doc)
                        <div class="px-3 py-2 my-3 border border-gray-300 flex justify-between items-center">
                            <a href="{{ route('documentos.ver', $doc->doc_file ?? '') }}" target="_blank">
                                {{ $doc->doc_nombre }}
                            </a>
                            <div>
                                <a href="{{ route('documentos.ver', $doc->doc_file ?? '') }}" target="_blank"
                                    class="ml-2 px-2 py-1 bg-gray-500 rounded-md hover:bg-udh_3 text-white">
                                    Ver
                                </a>
                                <button class="mt-1 ml-2 px-2 py-1 bg-gray-500 rounded-md hover:bg-udh_3 text-white"
                                    wire:click="descargar('{{ $doc->doc_file }}')">
                                    <i class="fa-solid fa-download"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="w-full flex items-center justify-between">
                <div>
                    @if ($necesidad->nec_proceso == 'En Espera')
                        @if ($mostrarConfirmacion)
                            <x-button-icon class="px-4 py-2 mr-2 bg-red-500 uppercase" wire:click="xconfirmar"
                                wire:loading.attr="disabled" wire:target="xconfirmar">
                                <span wire:loading wire:target="xconfirmar">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                                <span wire:loading.remove wire:target="xconfirmar">
                                    X
                                </span>
                            </x-button-icon>

                            <x-button wire:click="confirmar" class="!bg-udh_1" wire:loading.attr="disabled">
                                Confirmar
                            </x-button>
                        @else
                            <x-button class="!bg-red-500" wire:click="noAplica" wire:loading.attr="disabled"
                                wire:target="noAplica">
                                <span wire:loading wire:target="noAplica">
                                    <i class="fas fa-spinner fa-spin mr-1"></i>
                                    Procesando...
                                </span>
                                <span wire:loading.remove wire:target="noAplica">
                                    Marcar como No Aplica
                                </span>
                            </x-button>
                        @endif
                    @endif
                </div>

                <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                    Cerrar
                </x-secondary-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
