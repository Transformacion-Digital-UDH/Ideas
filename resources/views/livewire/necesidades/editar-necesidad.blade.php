<x-dialog-modal wire:model="showModal">
    <x-slot name="title">
        Agregar Necesidad
    </x-slot>

    <x-slot name="content">
    <section>
        <h2 class="text-2xl font-bold text-center text-sky-700 mb-4">Editar Información General</h2>
        <p class="text-sm text-gray-600 text-left mb-8">
            Por favor, actualice los siguientes campos con la información relacionada a la institución que ha identificado un problema.
        </p>
    
        <form wire:submit.prevent="actualizarNecesidad" enctype="multipart/form-data">
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
                <div class="text-red-500 text-xs mt-1">@error('nec_tipo') {{ $message }} @enderror</div>
            </div>
    
            @if ($nec_tipo !== 'Ciudadano')
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                    <div class="sm:w-2/4 px-1">
                        <input type="text" wire:model="nec_entidad" placeholder="Nombre de la institución" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                        <div class="text-red-500 text-xs mt-1">@error('nec_entidad') {{ $message }} @enderror</div>
                    </div>
                    <div class="sm:w-2/4 px-1">
                        <div id="rucMessage" class="hidden text-gray-500 text-xs mb-1 text-center">
                            Ingrese 11 dígitos
                        </div>
                        <input type="text" wire:model="nec_documento" id="ruc" placeholder="RUC" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                        <div class="text-red-500 text-xs mt-1">@error('nec_documento') {{ $message }} @enderror</div>
                    </div>
                </div>
            @else
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                    <div class="sm:w-2/4 px-1">
                        <input type="text" wire:model="nec_entidad" placeholder="Nombres completos" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                        <div class="text-red-500 text-xs mt-1">@error('nec_entidad') {{ $message }} @enderror</div>
                    </div>
                    <div class="sm:w-2/4 px-1">
                        <div id="dniMessage" class="hidden text-gray-500 text-xs mb-1 text-center">
                            Ingrese 8 dígitos
                        </div>
                        <input type="text" wire:model="nec_documento" id="dni" placeholder="DNI" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                        <div class="text-red-500 text-xs mt-1">@error('nec_documento') {{ $message }} @enderror</div>
                    </div>
                </div>
            @endif
    
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                <div class="sm:w-2/4 px-1">
                    <div id="emailMessage" class="hidden text-gray-500 text-xs mb-1 text-center">
                        Ingrese un correo válido
                    </div>
                    <input type="email" wire:model="nec_email" id="email" placeholder="Correo electrónico" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                    <div class="text-red-500 text-xs mt-1">@error('nec_email') {{ $message }} @enderror</div>
                </div>
                <div class="sm:w-2/4 px-1">
                    <div id="telefonoMessage" class="hidden text-gray-500 text-xs mb-1 text-center">
                        Ingrese 9 dígitos
                    </div>
                    <input type="text" wire:model="nec_telefono" id="telefono" placeholder="Número de teléfono" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                    <div class="text-red-500 text-xs mt-1">@error('nec_telefono') {{ $message }} @enderror</div>
                </div>
            </div>
    
            <div class="mb-4">
                <input type="text" wire:model="nec_dirección" placeholder="Dirección de la institución" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                <div class="text-red-500 text-xs mt-1">@error('nec_dirección') {{ $message }} @enderror</div>
            </div>
    
            <div class="rounded-lg shadow-lg p-8 space-y-6 bg-gray-100 mb-8">
                <h2 class="text-2xl font-bold text-center text-sky-700">
                    Detalles del Problema
                </h2>
                <p class="text-sm text-gray-600 text-left">
                    Por favor, proporciona un título breve pero descriptivo y una
                    explicación detallada del problema que estás experimentando.
                </p>
                <div class="mb-4">
                    <input type="text" wire:model="nec_titulo" placeholder="Título del problema" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center" />
                    <div class="text-red-500 text-xs mt-1">@error('nec_titulo') {{ $message }} @enderror</div>
                </div>
                <div class="mb-4">
                    <textarea wire:model="nec_descripcion" placeholder="Descripción del problema" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 text-center"></textarea>
                    <div class="text-red-500 text-xs mt-1">@error('nec_descripcion') {{ $message }} @enderror</div>
                </div>
            </div>
        </form>
    </section>
</x-slot>
        
