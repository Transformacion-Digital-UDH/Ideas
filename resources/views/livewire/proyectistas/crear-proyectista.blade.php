<div>
    <div class="flex justify-center">
        <x-button-icon class="px-3 py-3 bg-udh_1 uppercase" wire:click="abrirModal" wire:loading.attr="disabled"
            wire:target="abrirModal">
            <span wire:loading wire:target="abrirModal" class="px-4">
                <i class="fas fa-spinner fa-spin mr-1"></i> Cargando...
            </span>
            <span wire:loading.remove wire:target="abrirModal">
                Agregar proyectista
            </span>
        </x-button-icon>
    </div>
    <x-dialog-modal wire:model="showModal" maxWidth="md">
        <x-slot name="title">
            Agregar proyectista
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" value="{{ __('Full Names') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" autocomplete="off" wire:model="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" autocomplete="off"
                    wire:model="email" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" autocomplete="off"
                    wire:model="password" />
                <x-input-error for="password" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-input id="telefono" class="block mt-1 w-full" type="text" autocomplete="off"
                    wire:model="telefono" />
                <x-input-error for="telefono" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="profesion" value="{{ __('Profesión') }}" />
                <x-input id="profesion" class="block mt-1 w-full" type="text" autocomplete="off"
                    wire:model="profesion" />
                <x-input-error for="profesion" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="descripcion" value="{{ __('Más detalles') }}" />
                <x-textarea id="descripcion" class="block mt-1 w-full" autocomplete="off" rows="3"
                    wire:model="descripcion" placeholder="Agrega más detalles del proyectista." />
                <x-input-error for="descripcion" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', null)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-2" wire:click="guardar" wire:loading.attr="disabled" wire:target="guardar">
                <span wire:loading wire:target="guardar">
                    <i class="fas fa-spinner fa-spin mr-1"></i> Guardando
                </span>
                <span wire:loading.remove wire:target="guardar">
                    Guardar
                </span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
