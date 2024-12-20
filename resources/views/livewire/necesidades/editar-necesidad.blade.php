<div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="content">
            <section>
                <h2 class="text-2xl font-bold text-center text-udh_3 mb-4">Información General</h2>
                <p class="text-sm text-gray-600 text-left mb-8">
                    Por favor, actualice la información relacionada con la idea que desea editar.
                </p>

                <form wire:submit.prevent="actualizar" enctype="multipart/form-data">
                    <div class="mb-4">
                        <x-select wire:model="nec_tipo" wire:change="ruc_dni" class="block w-full">
                            <option value="" selected hidden>Seleccione tipo de entidad...</option>
                            <option value="Empresa privada">Empresa privada</option>
                            <option value="Institución pública">Institución pública</option>
                            <option value="ONG">Sociedad civil organizada (ONGs)</option>
                            <option value="Universidad / Instituto">Universidad / Instituto</option>
                            <option value="Ciudadano">Ciudadano</option>
                        </x-select>
                        <x-input-error for="nec_tipo" class="mt-2" />
                    </div>

                    @if ($es_institucion)
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                            <div class="sm:w-2/4 px-1">
                                <x-input wire:model="nec_empresa" placeholder="Nombre o Razón social"
                                    class="text-center" />
                                <x-input-error for="nec_empresa" />
                            </div>
                            <div class="sm:w-2/4 px-1">
                                <div id="rucMessage" class="hidden text-gray-500 text-xs mb-1 text-center">
                                    Ingrese 11 dígitos
                                </div>
                                <x-input wire:model="nec_ruc" id="ruc" placeholder="RUC" class="text-center" />
                                <x-input-error for="nec_ruc" />
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                            <div class="sm:w-2/4 px-1">
                                <x-input wire:model="nec_persona" placeholder="Nombres completos" class="text-center" />
                                <x-input-error for="nec_persona" />
                            </div>
                            <div class="sm:w-2/4 px-1">
                                <div id="dniMessage" class="hidden text-gray-500 text-xs mb-1 text-center">
                                    Ingrese 8 dígitos
                                </div>
                                <x-input wire:model="nec_dni" id="dni" placeholder="DNI" class="text-center" />
                                <x-input-error for="nec_dni" />
                            </div>
                        </div>
                    @endif

                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                        <div class="sm:w-2/4 px-1">
                            <x-input type="email" wire:model="nec_email" placeholder="Correo electrónico"
                                class="block mt-1 text-center" />
                            <x-input-error for="nec_email" class="mt-2" />
                        </div>
                        <div class="sm:w-2/4 px-1">
                            <x-input wire:model="nec_telefono" placeholder="Número de celular"
                                class="block mt-1 text-center" />
                            <x-input-error for="nec_telefono" class="mt-2" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-input type="text" wire:model="nec_direccion" placeholder="Dirección"
                            class="block mt-1 text-center" />
                        <x-input-error for="nec_direccion" class="mt-2" />
                    </div>

                    <div class="rounded-lg shadow-lg p-8 space-y-6 bg-gray-100">
                        <h2 class="text-2xl font-bold text-center text-udh_3">
                            Detalles del Problema
                        </h2>
                        <p class="text-sm text-gray-600 text-left">
                            Por favor, proporciona un título breve pero descriptivo y una
                            explicación detallada del problema que estás experimentando.
                        </p>

                        <div class="mb-2">
                            <x-input type="text" wire:model="nec_titulo" placeholder="Breve título del problema"
                                class="block mt-1 text-center" />
                            <x-input-error for="nec_titulo" class="mt-2" />
                        </div>
                        <div class="mb-2">
                            <x-textarea wire:model="nec_descripcion"
                                placeholder="Cuéntanos, con mayor detalle, en qué consiste el problema."
                                class="block mt-1 w-full" />
                            <x-input-error for="nec_descripcion" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <div class="flex items-center justify-center">
                                <label for="es_financiado" class="pr-4 font-normal">¿Desea financiarlo?</label>
                                <label class="flex items-center pl-2">
                                    <x-radio value="SI" wire:model="es_financiado" name="es_financiado"
                                        id="es_financiado" />
                                    <span class="pl-2 pr-6">SI</span>
                                </label>
                                <label class="flex items-center">
                                    <x-radio value="NO" wire:model="es_financiado" name="es_financiado" />
                                    <span class="pl-2">NO</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 p-8">
                        <h2 class="text-2xl font-bold text-center text-udh_3">Adjuntar Archivos</h2>
                        <p class="text-sm text-gray-600 text-left my-2">
                            Opcionalmente, puede proporcionar más información sobre su problema para una mejor solución,
                            puede adjuntar un archivo haciendo click en el siguiente apartado.
                        </p>
                        @if (isset($documentos))
                            @foreach ($documentos as $doc)
                                <div class="px-3 py-2 my-3 border border-gray-300 flex justify-between items-center">
                                    <a href="{{ route('documentos.ver', $doc->doc_file ?? '') }}" target="_blank">
                                        {{ $doc->doc_nombre }}
                                    </a>
                                    <div>
                                        <button type="button"
                                            class="mt-1 ml-2 px-2 py-1 bg-red-500 border rounded-md hover:bg-red-600 text-white"
                                            wire:click="eliminar('{{ $doc->doc_file }}')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @foreach ($files as $index => $file)
                            <div class="flex space-x-2 items-center">
                                <input type="file" wire:model="files.{{ $index }}"
                                    class="block w-full text-center p-2 h-12 border-2 bg-gray-200" />

                                <x-button-icon wire:click="quitarFile({{ $index }})"
                                    class="text-red-500 bg-red-500 px-3 h-12">
                                    X
                                </x-button-icon>
                            </div>

                            <x-input-error for="files.{{ $index }}" class="mt-2" />
                        @endforeach
                        @if ($n_docs + count($files) < 4)
                            <p wire:click="agregarFile" class="cursor-pointer text-udh_1 hover:underline font-bold">
                                <i class="fa-solid fa-plus"></i>
                                Añadir archivo
                            </p>
                        @endif
                    </div>
                </form>
            </section>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-2" wire:click="actualizar" wire:loading.attr="disabled" wire:target="actualizar">
                <span wire:loading wire:target="actualizar">
                    <i class="fas fa-spinner fa-spin mr-1"></i> Actualizando...
                </span>
                <span wire:loading.remove wire:target="actualizar">
                    Actualizar
                </span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
