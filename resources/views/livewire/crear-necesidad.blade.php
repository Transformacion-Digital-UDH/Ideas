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
                    Por favor, complete los siguientes campos con la información relacionada a la institución que ha identificado un problema.
                </p>
            
                <form wire:submit.prevent="guardarNecesidad" enctype="multipart/form-data">
                    <div class="mb-4">
                        <select id="tipo_institucion" wire:model="nec_tipo" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500">
                            <option value="" selected hidden>Seleccione tipo de entidad...</option>
                            <option value="Empresa privada">Empresa privada</option>
                            <option value="Institución pública">Institución pública</option>
                            <option value="ONG">Sociedad civil organizada (ONGs)</option>
                            <option value="Universidad">Universidad</option>
                            <option value="Instituto">Instituto</option>
                            <option value="Ciudadano">Ciudadano</option>
                        </select>
                    </div>
            
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                        <div class="sm:w-2/4 px-1">
                            <input type="email" wire:model="nec_email" id="email" placeholder="Correo electrónico" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                        </div>
                        <div class="sm:w-2/4 px-1">
                            <input type="text" wire:model="nec_telefono" id="telefono" placeholder="Número de teléfono" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                        </div>
                    </div>
            
                    <div class="mb-4">
                        <input type="text" wire:model="nec_direccion" placeholder="Dirección de la institución" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
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
                            <input type="text" wire:model="nec_titulo" placeholder="Breve título del problema" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                        </div>
                        <div class="mb-2">
                            <textarea wire:model="nec_descripcion" placeholder="Cuéntanos, con mayor detalle, en qué consiste el problema." class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500"></textarea>
                        </div>
            
                        <div class="mb-2">
                            <div class="flex items-center justify-center">
                                <label for="es_financiado" class="pr-4 font-normal">¿Desea financiarlo?</label>
                                <label class="flex items-center pl-2">
                                    <input type="radio" value="1" wire:model="es_financiado" name="es_financiado" id="es_financiado" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300" />
                                    <span class="pl-2 pr-6">SI</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" value="0" wire:model="es_financiado" name="es_financiado" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300" />
                                    <span class="pl-2">NO</span>
                                </label>
                            </div>
                        </div>
                    </div>
            
                    <div class="space-y-4 p-8">
                        <h2 class="text-2xl font-bold text-center text-sky-700">Adjuntar Archivos</h2>
                        <p class="text-sm text-gray-600 text-left my-2">
                            Opcionalmente, puede proporcionar más información sobre su problema para una mejor solución, puede adjuntar un archivo haciendo clic en el siguiente apartado.
                        </p>
            
                        <input type="file" wire:model="doc_nombre" class="block w-full text-center p-2 h-12 border-2 bg-gray-200" />
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
