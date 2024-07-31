<div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            Postular
        </x-slot>

        <x-slot name="content">
            @role('DOCENTE')
                <div class="mt-6">
                    <x-label for="equ_id" value="{{ __('Curso o Equipo') }}" />
                    <x-select id="equ_id" class="block mt-1 w-full" wire:model.defer="equ_id" required>
                        <option value="" selected hidden>Seleccionar...</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->equ_id }}">{{ $equipo->equ_codigo }} - {{ $equipo->equ_nombre }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="equ_id" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-label for="pos_seccion" value="{{ __('Sección') }}" />
                    <x-select id="pos_seccion" class="block mt-1 w-full" wire:model.defer="pos_seccion" required>
                        <option value="" selected hidden>Seleccionar...</option>
                        <option value="A">Sección: A</option>
                        <option value="B">Sección: B</option>
                        <option value="C">Sección: C</option>
                        <option value="D">Sección: D</option>
                        <option value="E">Sección: E</option>
                        <option value="F">Sección: F</option>
                    </x-select>
                    <x-input-error for="pos_seccion" class="mt-2" />
                </div>
            @endrole
            <div class="mt-6">
                <x-label for="pos_justificar" value="{{ __('Justificación') }}" />
                <x-textarea id="pos_justificar" class="block mt-1 w-full" type="text"
                    wire:model.defer="pos_justificar" placeholder="Por que te eligirian a ti, justificar." required />
                <x-input-error for="pos_justificar" class="mt-2" />
            </div>

            <x-input-error for="pro_id" class="mt-2" />
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', null)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-2" wire:click="guardar" wire:loading.attr="disabled">
                Postular
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
