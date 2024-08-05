<div>
    <div class="flex justify-center">
        <button wire:click="abrirModal"
            class="middle px-4 py-2 bg-cyan-500 hover:bg-cyan-700 text-white rounded-lg mr-4 text-lg font-bold shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-50">
            Agregar equipo
        </button>
    </div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="content">
            <section>
                <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
                    <div class="mb-4">
                        <x-select wire:model="equ_tipo" wire:change="curso_sem" class="block w-full">
                            <option value="" selected hidden>Seleccione tipo de equipo...</option>
                            <option value="Curso">Curso</option>
                            <option value="Semillero">Semillero</option>
                        </x-select>
                        <x-input-error for="equ_tipo" class="mt-2" />
                    </div>

                    @if($es_curso)
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                            <div class="sm:w-2/4 px-1">
                                <x-input wire:model="equ_codigo" placeholder="Código"
                                    class="block mt-1 text-center" />
                                <x-input-error for="equ_codigo" class="mt-2" />
                            </div>
                            <div class="sm:w-2/4 px-1">
                                <x-input wire:model="equ_ciclo" placeholder="Ciclo"
                                    class="block mt-1 text-center" />
                                <x-input-error for="equ_ciclo" class="mt-2" />
                            </div>
                        </div>
                    @else 
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                        <div class="sm:w-2/4 px-1">
                            <x-input wire:model="equ_codigo" placeholder="Resolución"
                                class="block mt-1 text-center" />
                            <x-input-error for="equ_codigo" class="mt-2" />
                        </div>
                    </div>

                    @endif
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center mb-4">
                        <div class="sm:w-2/4 px-1">
                            <x-input wire:model="equ_nombre" placeholder="Nombre"
                                class="block mt-1 text-center" />
                            <x-input-error for="equ_nombre" class="mt-2" />
                        </div>
                    </div>
                </form>
            </section>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-2" wire:click="guardarEquipo" wire:loading.attr="disabled">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
