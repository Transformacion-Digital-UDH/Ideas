<div>
    <x-dialog-modal wire:model="showModal" maxWidth="5xl">
        <x-slot name="title">
            Editar Necesidad
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-wrap">
                <!-- Columna izquierda (60%) -->
                <div class="w-full lg:w-3/6 pt-4 lg:pr-5 lg:border-r">
                    <div class="mb-6">
                        <h2 class="text-md font-bold text-sky-700">INFORMACIÓN DE SOLICITANTE</h2>
                        <ul class="mt-5 list-disc list-inside">
                            <li class="flex items-center">
                                <div
                                    class="bg-[#e6e6e6cf] text-sky-700 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                </div>
                                <div class="text-md ml-3">
                                    <span class="block">{{ $necesidad->nec_tipo }}</span>
                                    <strong>{{ $necesidad->nec_entidad }}</strong>
                                </div>
                            </li>
                            <li class="flex items-center pt-6">
                                <div
                                    class="bg-[#e6e6e6cf] text-sky-700 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                                <div class="text-md ml-2">
                                    <p class="text-sm">Celular: <b>901231876</b></p>
                                    <p class="text-sm">Email: <b>{{ $necesidad->nec_email }}</b></p>
                                </div>
                            </li>
                            <li class="flex items-center pt-4">
                                <div
                                    class="bg-[#e6e6e6cf] text-sky-700 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
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
                        <h2 class="text-md font-bold text-sky-700">PROBLEMÁTICA</h2>
                        <div class="border border-gray-300 text-sm p-2 mt-3 w-100">
                            {{ $necesidad->nec_titulo }}
                        </div>
                        <div class="mt-3">
                            <i class="text-sm font-bold pb-1 block">Descripción: </i>
                            <p class="text-sm break-words">{{ $necesidad->nec_descripcion }}</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h2 class="text-md font-bold text-sky-700">DOCUMENTOS</h2>
                        <ul class="list-disc list-inside mt-3">
                            <li class="pb-2"><a href="#">2020254258752.pdf</a></li>
                            <li class="pb-2"><a href="#">15265587445555.jpg</a></li>
                            <li class="pb-2"><a href="#">5588555555555147.pdf</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Columna derecha (40%) -->
                <div class="w-full lg:w-3/6 lg:pl-5 mt-6 lg:mt-0">
                    <!-- Selección de Tipo -->
                    <div class="mb-4">
                        <div class="mt-1 flex justify-between gap-2 botones">
                            @role('ESCUELA')
                                <button id="btn-curso" onclick="selectOption('curso')"
                                    class="flex-1 py-2 px-3 bg-blue-500 text-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                    Curso
                                </button>
                                <button id="btn-tesis" onclick="selectOption('tesis')"
                                    class="flex-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                    Tesis
                                </button>
                            @endrole
                            @role('VRI')
                                <button id="btn-proyecto" onclick="selectOption('proyecto')"
                                    class="flex-1 py-2 px-3 border bg-blue-500 text-white border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                    Proyecto
                                </button>
                            @endrole
                        </div>
                    </div>

                    <!-- Formulario -->
                    <div class="w-100">
                        @role('ESCUELA')
                            <form id="curso-form">
                                @livewire('curaciones.editar-curso')
                            </form>

                            <div id="tesis-form" class="hidden">
                                @livewire('curaciones.editar-tesis')
                            </div>
                        @endrole
                        @role('VRI')
                            <form id="proyecto-form">
                                @livewire('curaciones.editar-proyecto')
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
                button.classList.remove('bg-blue-500', 'text-white');
                button.classList.add('bg-white', 'text-gray-700');
            });

            forms.forEach(form => {
                form.classList.add('hidden');
            });

            document.getElementById('btn-' + value).classList.remove('bg-white', 'text-gray-700');
            document.getElementById('btn-' + value).classList.add('bg-blue-500', 'text-white');
            document.getElementById(value + '-form').classList.remove('hidden');
        }
    </script>
</div>
