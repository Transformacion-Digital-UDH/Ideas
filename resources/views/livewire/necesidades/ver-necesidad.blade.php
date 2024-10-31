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
                                {{ \Carbon\Carbon::parse($necesidad->nec_created)->format('d/m/Y \a \l\a\s H:i') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                @role('VRI|ESCUELA')
                    <h3 class="pt-5 font-bold text-md text-udh_1">Propuestas</h3>
                    @if (count($necesidad->propuestas) > 0)
                        @foreach ($necesidad->propuestas as $propuesta)
                            <div class="px-3 py-2 my-3 border border-gray-300">
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
                                <button
                                    class="mt-1 ml-2 px-2 py-1 bg-gray-500 rounded-md hover:bg-udh_3 text-white"
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
            <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
