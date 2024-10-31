<div>
    <div class="flex justify-center">
        <x-button-icon class="px-3 py-3 bg-udh_1 uppercase" wire:click="abrirModal" wire:loading.attr="disabled"
            wire:target="abrirModal">
            <span wire:loading wire:target="abrirModal">
                <i class="fas fa-spinner fa-spin mr-1"></i> Cargando...
            </span>
            <span wire:loading.remove wire:target="abrirModal">
                Agregar equipo
            </span>
        </x-button-icon>
    </div>
    <x-dialog-modal wire:model="showModal" maxWidth="xl">
        <x-slot name="title">
            <h2 class="text-base">Agregar equipo</h2>
        </x-slot>
        <x-slot name="content">
            <section>
                <div class="mb-4 mt-4">
                    <x-label for="equ_tipo" value="{{ __('Tipo') }}" />
                    <x-select wire:model="equ_tipo" wire:change="curso_sem" class="block w-full">
                        <option value="" selected hidden>Seleccione...</option>
                        <option value="Curso">Curso</option>
                        <option value="Semillero">Semillero</option>
                        <option value="Otro">Otro</option>
                    </x-select>
                    <x-input-error for="equ_tipo" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-label for="equ_nombre" value="{{ __('Nombre') }}" />
                    <x-input wire:model="equ_nombre" placeholder="Nombre" class="block mt-1" />
                    <x-input-error for="equ_nombre" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-label for="equ_codigo" value="{{ __('Código') }}" />
                    <x-input wire:model="equ_codigo" placeholder="Código" class="block mt-1" />
                    <x-input-error for="equ_codigo" class="mt-2" />
                </div>

                @if ($es_curso)
                    <div class="mb-2">
                        <x-label for="equ_ciclo" value="{{ __('Ciclo') }}" />
                        <x-select wire:model="equ_ciclo" class="block w-full">
                            <option value="" selected hidden>Seleccione...</option>
                            <option value="1">1 Ciclo</option>
                            <option value="2">2 Ciclo</option>
                            <option value="3">3 Ciclo</option>
                            <option value="4">4 Ciclo</option>
                            <option value="5">5 Ciclo</option>
                            <option value="6">6 Ciclo</option>
                            <option value="7">7 Ciclo</option>
                            <option value="8">8 Ciclo</option>
                            <option value="9">9 Ciclo</option>
                            <option value="10">10 Ciclo</option>
                            <option value="11">11 Ciclo</option>
                            <option value="12">12 Ciclo</option>
                            <option value="13">13 Ciclo</option>
                            <option value="14">14 Ciclo</option>
                        </x-select>
                        <x-input-error for="equ_ciclo" class="mt-2" />
                    </div>
                @endif
            </section>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-2" wire:click="guardarEquipo" wire:loading.attr="disabled"
                wire:target="guardarEquipo">
                <span wire:loading wire:target="guardarEquipo">
                    <i class="fas fa-spinner fa-spin mr-1"></i> Guardando
                </span>
                <span wire:loading.remove wire:target="guardarEquipo">
                    Guardar
                </span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
