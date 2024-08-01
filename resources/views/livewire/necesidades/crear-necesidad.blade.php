<div>
    <div class="flex justify-center">
        <button wire:click="abrirModal"
            class="middle px-4 py-2 bg-cyan-500 hover:bg-cyan-700 text-white rounded-lg mr-4 text-lg font-bold shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-50">
            Agregar Problema
        </button>
    </div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="content">
            <section>
                <h2 class="text-2xl font-bold text-center text-sky-700 mb-4">Información General</h2>
                <p class="text-sm text-gray-600 text-left mb-8">
                    Por favor, complete los siguientes campos con la información relacionada a la institución que ha
                    identificado un problema.
                </p>

                <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
                    <div class="mb-4">
                        <x-select wire:model="nec_tipo" class="block w-full">
                            <option value="" selected hidden>Seleccione tipo de entidad...</option>
                            <option value="Empresa privada">Empresa privada</option>
                            <option value="Institución pública">Institución pública</option>
                            <option value="ONG">Sociedad civil organizada (ONGs)</option>
                            <option value="Universidad">Universidad</option>
                            <option value="Instituto">Instituto</option>
                            <option value="Ciudadano">Ciudadano</option>
                        </x-select>
                        <x-input-error for="nec_tipo" class="mt-2" />
                    </div>

                    @if ($es_institucion)
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                            <div class="sm:w-2/4 px-1">
                                <x-input wire:model="nombre_entidad" placeholder="Nombre de la institución"
                                    class="text-center" />
                                <x-input-error for="nombre_entidad" />
                            </div>
                            <div class="sm:w-2/4 px-1">
                                <div id="rucMessage" class="hidden text-gray-500 text-xs mb-1 text-center">
                                    Ingrese 11 dígitos
                                </div>
                                <x-input wire:model="ruc" id="ruc" placeholder="RUC" class="text-center" />
                                <x-input-error for="ruc" />
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                            <div class="sm:w-2/4 px-1">
                                <x-input wire:model="nombre_persona" placeholder="Nombres completos"
                                    class="text-center" />
                                <x-input-error for="nombre_persona" />
                            </div>
                            <div class="sm:w-2/4 px-1">
                                <div id="dniMessage" class="hidden text-gray-500 text-xs mb-1 text-center">
                                    Ingrese 8 dígitos
                                </div>
                                <x-input wire:model="dni" id="dni" placeholder="DNI" class="text-center" />
                                <x-input-error for="dni" />
                            </div>
                        </div>
                    @endif

                    {{-- <div class="mb-4">
                        <x-input type="text" wire:model="nec_documento" placeholder="Documento de Identidad"
                            class="block mt-1" />
                        <x-input-error for="nec_documento" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input type="text" wire:model="nec_entidad" placeholder="Nombre" class="block mt-1" />
                        <x-input-error for="nec_entidad" class="mt-2" />
                    </div> --}}

                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                        <div class="sm:w-2/4 px-1">
                            <x-input type="email" wire:model="nec_email" placeholder="Correo electrónico"
                                class="block mt-1 text-center" />
                            <x-input-error for="nec_email" class="mt-2" />
                        </div>
                        <div class="sm:w-2/4 px-1">
                            <x-input wire:model="nec_telefono" placeholder="Número de teléfono"
                                class="block mt-1 text-center" />
                            <x-input-error for="nec_telefono" class="mt-2" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-input type="text" wire:model="nec_direccion" placeholder="Dirección" class="block mt-1" />
                        <x-input-error for="nec_direccion" class="mt-2" />
                    </div>

                    <div class="rounded-lg shadow-lg p-8 space-y-6 bg-gray-100 mb-8">
                        <h2 class="text-2xl font-bold text-center text-sky-700">
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
                                class="block mt-1 w-full text-center" />
                            <x-input-error for="nec_descripcion" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <div class="flex items-center justify-center">
                                <label for="es_financiado" class="pr-4 font-normal">¿Desea financiarlo?</label>
                                <label class="flex items-center pl-2">
                                    <input type="radio" value="SI" wire:model="es_financiado"
                                        name="es_financiado" id="es_financiado"
                                        class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300" />
                                    <span class="pl-2 pr-6">SI</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" value="NO" wire:model="es_financiado"
                                        name="es_financiado" id="es_financiado"
                                        class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300" />
                                    <span class="pl-2">NO</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4 p-8">
                        <h2 class="text-2xl font-bold text-center text-sky-700">Adjuntar Archivos</h2>
                        <p class="text-sm text-gray-600 text-left my-2">
                            Opcionalmente, puede proporcionar más información sobre su problema para una mejor solución,
                            puede adjuntar un archivo haciendo clic en el siguiente apartado.
                        </p>

                        <input type="file" wire:model="doc_nombre"
                            class="block w-full text-center p-2 h-12 border-2 bg-gray-200" />
                        <x-input-error for="doc_nombre" class="mt-2" />
                    </div>
                </form>
            </section>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-2" wire:click="guardarNecesidad" wire:loading.attr="disabled">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
