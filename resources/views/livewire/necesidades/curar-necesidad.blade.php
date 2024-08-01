<div>
    <x-dialog-modal wire:model="showModal" maxWidth="2xl">
        <x-slot name="title">
            Curar necesidad
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-wrap">
                <!-- Columna izquierda (60%) -->
                <div class="w-full lg:w-3/5 pt-4 lg:pr-5 lg:border-r">
                    <div class="mb-6">
                        <h2 class="text-md font-bold text-sky-700">INFORMACIÓN DE SOLICITANTE</h2>
                        <ul class="mt-5 list-disc list-inside">
                            <li class="flex items-center">
                                <div class="bg-[#e6e6e6cf] text-sky-700 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                </div>
                                <div class="text-md ml-3">
                                    <span class="block">{{ $necesidad->nec_tipo }}</span>
                                    <strong>{{ $necesidad->nec_entidad }}</strong>
                                </div>
                            </li>
                            <li class="flex items-center pt-6">
                                <div class="bg-[#e6e6e6cf] text-sky-700 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                                <div class="text-md ml-2">
                                    <p class="text-sm">Celular: <b>901231876</b></p>
                                    <p class="text-sm">Email: <b>{{ $necesidad->nec_email }}</b></p>
                                </div>
                            </li>
                            <li class="flex items-center pt-4">
                                <div class="bg-[#e6e6e6cf] text-sky-700 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa fa-diamond" aria-hidden="true"></i>
                                </div>
                                <div class="text-md ml-3">
                                    <div class="py-4">
                                        @if ($necesidad->nec_financiar == 'NO')
                                            <span class="inline-block mt-0 rounded-lg font-medium text-red-800 bg-red-100 px-1 relative">NO</span>
                                        @else
                                            <span class="inline-block mt-0 rounded-lg font-medium text-green-800 bg-green-100 px-1 relative">SI</span>
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
                <div class="w-full lg:w-2/5 lg:pl-5 mt-6 lg:mt-0">
                    <!-- Selección de Tipo -->
                    <div class="mb-4">
                        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                        <select id="tipo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="curso">Curso</option>
                            <option value="tesis">Tesis</option>
                            <option value="proyecto">Proyecto</option>
                        </select>
                    </div>

                    <!-- Formulario -->
                    <div id="form-container">
                        <!-- Formulario dinámico basado en la selección -->
                        <!-- Inicialmente se puede mostrar un formulario vacío o un mensaje -->
                        <form id="curso-form" class="hidden">
                            <!-- Campos del formulario para Curso -->
                            <h3 class="text-lg font-semibold mb-4">Formulario de Curso</h3>
                            <!-- Agrega aquí los campos correspondientes -->
                        </form>

                        <form id="tesis-form" class="hidden">
                            <!-- Campos del formulario para Tesis -->
                            <h3 class="text-lg font-semibold mb-4">Formulario de Tesis</h3>
                            <!-- Agrega aquí los campos correspondientes -->
                        </form>

                        <form id="proyecto-form" class="hidden">
                            <!-- Campos del formulario para Proyecto -->
                            <h3 class="text-lg font-semibold mb-4">Formulario de Proyecto</h3>
                            <!-- Agrega aquí los campos correspondientes -->
                        </form>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', null)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-2" wire:click="actualizar" wire:loading.attr="disabled">
                Actualizar
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <script>
        document.getElementById('tipo').addEventListener('change', function() {
            // Ocultar todos los formularios
            document.getElementById('curso-form').classList.add('hidden');
            document.getElementById('tesis-form').classList.add('hidden');
            document.getElementById('proyecto-form').classList.add('hidden');

            // Mostrar el formulario seleccionado
            const selectedType = this.value;
            if (selectedType === 'curso') {
                document.getElementById('curso-form').classList.remove('hidden');
            } else if (selectedType === 'tesis') {
                document.getElementById('tesis-form').classList.remove('hidden');
            } else if (selectedType === 'proyecto') {
                document.getElementById('proyecto-form').classList.remove('hidden');
            }
        });
    </script>
</div>
