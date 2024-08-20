<div>
    <x-dialog-modal wire:model="showModal" maxWidth="5xl">
        <x-slot name="content">
            <div class="flex flex-wrap">
                <!-- Columna izquierda (60%) -->
                <div class="w-full lg:w-3/6 lg:pr-5 lg:border-r">
                    <div class="mb-6">
                        <h2 class="text-md font-bold text-udh_1">INFORMACIÓN DE SOLICITANTE</h2>
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
                                    <p class="text-sm">Celular: <b>901231876</b></p>
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
                        <div class="mt-1 flex justify-between gap-2 text-center">
                            @role('ESCUELA')
                                @if ($propuesta->pro_tipo == 'Curso')
                                    <div
                                        class="flex-1 py-2 px-3 bg-udh_1 text-white border
                                         border-gray-300 rounded-md shadow-sm focus:outline-none
                                          focus:ring-udh_1 focus:border-udh_1 text-sm">
                                        Curso
                                    </div>
                                @else
                                    <div
                                        class="flex-1 py-2 px-3 bg-udh_1 text-white border
                                         border-gray-300 rounded-md shadow-sm focus:outline-none
                                          focus:ring-udh_1 focus:border-udh_1 text-sm">
                                        Tesis
                                    </div>
                                @endrole
                            @endif
                            @role('VRI')
                                <div
                                    class="flex-1 py-2 px-3 border bg-udh_1 text-white
                                     border-gray-300 rounded-md shadow-sm focus:outline-none
                                      focus:ring-udh_1 focus:border-udh_1 text-sm">
                                    Proyecto
                                </div>
                            @endrole
                        </div>
                    </div>

                    <!-- Formulario -->
                    <div class="w-100">
                        @role('ESCUELA')
                            @if ($propuesta->pro_tipo == 'Curso')
                                <form id="curso-form">

                                    <div class="mt-5">
                                        <x-input class="block mt-1 w-full" type="text" wire:model="pro_titulo"
                                            placeholder="Ingrese un título tentativo" />
                                        <x-input-error for="pro_titulo" class="mt-2" />
                                    </div>
                                    <div class="mt-5">
                                        <x-textarea class="block mt-1 w-full" wire:model="problematicas"
                                            placeholder="Ingresa el problema a tratar." />
                                        <x-input-error for="problematicas" class="mt-2" />
                                    </div>
                                    <div class="mt-5">
                                        <x-input class="block mt-1 w-full" type="text" wire:model="pro_beneficiarios"
                                            placeholder="A quienes" />
                                        <x-input-error for="pro_beneficiarios" class="mt-2" />
                                    </div>
                                    <div class="mt-5">
                                        <x-input class="block mt-1 w-full" type="text" wire:model="pro_lugar"
                                            placeholder="Ingrese el lugar de aplicación" />
                                        <x-input-error for="pro_lugar" class="mt-2" />
                                    </div>
                                    <div class="mt-5">
                                        <x-textarea class="block mt-1 w-full" wire:model="pro_descripcion"
                                            placeholder="Agrega una descripción para la propuesta." />
                                        <x-input-error for="pro_descripcion" class="mt-2" />
                                    </div>
                                </form>
                            @else
                                <form id="tesis-form">
                                    <div class="mt-4">
                                        <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_lugar"
                                            placeholder="Dónde se va a implementar" />
                                        <x-input-error for="pro_lugar" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input class="block mt-1 w-full" type="text"
                                            wire:model.defer="pro_beneficiarios" placeholder="A quiénes va a beneficiar" />
                                        <x-input-error for="pro_beneficiarios" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-textarea class="block mt-1 w-full" rows="2"
                                            wire:model.defer="problematicas" placeholder="Problematica a tratar" />
                                        <x-input-error for="problematicas" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_causas"
                                            placeholder="Cuáles son las causas" />
                                        <x-input-error for="pro_causas" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input class="block mt-1 w-full" type="text"
                                            wire:model.defer="pro_consecuencias"
                                            placeholder="Cuáles son las consecuencias" />
                                        <x-input-error for="pro_consecuencias" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_aportes"
                                            placeholder="Ingrese posibles aportes" />
                                        <x-input-error for="pro_aportes" class="mt-2" />
                                    </div>

                                    <hr class="my-4 border border-blue-600">

                                    <div class="mt-4">
                                        <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_titulo"
                                            placeholder="Ingrese un título tentativo" />
                                        <x-input-error for="pro_titulo" class="mt-2" />
                                    </div>

                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-3/6 lg:pr-3">
                                            <div class="mt-2">
                                                <x-input class="block mt-1 w-full" type="text"
                                                    wire:model.defer="variable_1" placeholder="Variable 1" />
                                                <x-input-error for="variable_1" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-3/6">
                                            <div class="mt-2">
                                                <x-input class="block mt-1 w-full" type="text"
                                                    wire:model.defer="variable_2" placeholder="Variable 2" />
                                                <x-input-error for="variable_2" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <x-textarea class="block mt-1 w-full" rows="2"
                                            wire:model.defer="pro_descripcion"
                                            placeholder="Agrega una descripción para la propuesta." />
                                        <x-input-error for="pro_descripcion" class="mt-2" />
                                    </div>
                                </form>
                            @endif
                        @endrole

                        @role('VRI')
                            <form id="proyecto-form">
                                <div class="mt-5">
                                    <x-textarea class="block mt-1 w-full" rows="2" wire:model.defer="pro_titulo"
                                        placeholder="Ingrese un título tentativo." />
                                    <x-input-error for="pro_titulo" class="mt-2" />
                                </div>

                                <div class="mt-5">
                                    <x-textarea class="block mt-1 w-full" wire:model.defer="pro_descripcion"
                                        placeholder="Agrega una descripción para la propuesta." />
                                    <x-input-error for="pro_descripcion" class="mt-2" />
                                </div>
                                <div class="mt-5">
                                    <x-textarea class="block mt-1 w-full" wire:model.defer="pro_justificacion"
                                        placeholder="Ingrese la justificación de la propuesta." />
                                    <x-input-error for="pro_justificacion" class="mt-2" />
                                </div>
                            </form>
                        @endrole
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button type="button" class="ml-2" wire:click="actualizarPropuesta" wire:loading.attr="disabled">
                Actualizar
            </x-button>
        </x-slot>
    </x-dialog-modal>


</div>
