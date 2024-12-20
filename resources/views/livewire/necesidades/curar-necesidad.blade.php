<div>
    <x-dialog-modal wire:model="showModal" maxWidth="5xl">

        <x-slot name="content">
            <div class="flex flex-wrap">
                <!-- Columna izquierda (60%) -->
                <div class="w-full lg:w-3/6 lg:pr-5 lg:border-r">
                    <div class="mb-6">
                        <h2 class="text-md font-bold text-udh_1">INFORMACIÓN DEL SOLICITANTE</h2>
                        <ul class="mt-5 list-disc list-inside">
                            <li class="flex items-center">
                                <div
                                    class="bg-[#e6e6e6cf] text-udh_3 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                </div>
                                <div class="text-md ml-3">
                                    <span class="block">{{ $necesidad->nec_tipo }}</span>
                                    <strong>{{ $necesidad->nec_entidad }}</strong>
                                </div>
                            </li>
                            <li class="flex items-center pt-6">
                                <div
                                    class="bg-[#e6e6e6cf] text-udh_3 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                                <div class="text-md ml-2">
                                    <p class="text-sm">Celular: <b>{{ $necesidad->nec_telefono }}</b></p>
                                    <p class="text-sm">Email: <b>{{ $necesidad->nec_email }}</b></p>
                                </div>
                            </li>
                            <li class="flex items-center pt-4">
                                <div
                                    class="bg-[#e6e6e6cf] text-udh_3 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa fa-diamond" aria-hidden="true"></i>
                                </div>
                                <div class="text-md ml-3">
                                    <div class="py-4">
                                        @if ($necesidad->nec_financiar == 'NO')
                                            <span
                                                class="inline-block mt-0 rounded-lg font-medium text-red-800 bg-red-100 px-1 relative">NO</span>
                                        @else
                                            <span
                                                class="inline-block mt-0 rounded-lg font-medium text-green-800 bg-green-100 px-1 relative">SI</span>
                                        @endif
                                        deseo financiarlo.
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-6">
                        <h2 class="text-md font-bold text-udh_1">PROBLEMÁTICA</h2>
                        <div class="border border-gray-300 text-sm p-2 mt-3 w-100">
                            {{ $necesidad->nec_titulo }}
                        </div>
                        <div class="mt-3">
                            <i class="text-sm font-bold pb-1 block">Descripción: </i>
                            <p class="text-sm break-words">{{ $necesidad->nec_descripcion }}</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h2 class="text-md font-bold text-udh_1">DOCUMENTOS</h2>
                        @if (count($documentos) > 0)
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
                        @else
                            <p class="mt-2">No hay documentos cargados.</p>
                        @endif
                    </div>
                </div>

                <!-- Columna derecha (40%) -->
                <div class="w-full lg:w-3/6 lg:pl-5 mt-6 lg:mt-0">
                    <!-- Selección de Tipo -->
                    <div class="mb-4">
                        <div class="mt-1 flex justify-between gap-2 botones">
                            @role('ESCUELA')
                                <button id="btn-curso" onclick="selectOption('curso')"
                                    class="flex-1 py-2 px-3 bg-udh_1 text-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-udh_1 focus:border-udh_1 text-sm">
                                    Curso
                                </button>
                                <button id="btn-tesis" onclick="selectOption('tesis')"
                                    class="flex-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-udh_1 focus:border-udh_1 text-sm">
                                    Tesis
                                </button>
                            @endrole
                            @role('VRI')
                                <button id="btn-proyecto" onclick="selectOption('Gestor UDH')"
                                    class="flex-1 py-2 px-3 border bg-udh_1 text-white border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-udh_1 focus:border-udh_1 text-sm">
                                    Gestor UDH
                                </button>
                            @endrole
                        </div>
                    </div>

                    <!-- Formulario -->
                    <div class="w-100">
                        @role('ESCUELA')
                            <form id="curso-form">
                                @livewire('curaciones.guardar-curso')
                            </form>

                            <div id="tesis-form" class="hidden">
                                @livewire('curaciones.guardar-tesis')
                            </div>
                        @endrole
                        @role('VRI')
                            <form id="proyecto-form">
                                @livewire('curaciones.guardar-proyecto')
                            </form>
                        @endrole
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', null)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    <script>
        function selectOption(value) {
            const buttons = document.querySelectorAll('.botones button');
            const forms = document.querySelectorAll('[id$="-form"]');

            if (value == null) {
                value = buttons[0].id.split('-')[1];
            }

            buttons.forEach(button => {
                button.classList.remove('bg-udh_1', 'text-white');
                button.classList.add('bg-white', 'text-gray-700');
            });

            forms.forEach(form => {
                form.classList.add('hidden');
            });

            document.getElementById('btn-' + value).classList.remove('bg-white', 'text-gray-700');
            document.getElementById('btn-' + value).classList.add('bg-udh_1', 'text-white');
            document.getElementById(value + '-form').classList.remove('hidden');
        }
    </script>
</div>
