<div>
    <x-dialog-modal wire:model="showModal" maxWidth="md">
        <x-slot name="title">
            Editar Proyectista
        </x-slot>

        <x-slot name="content">
            <div class="mt-6">
                <x-label for="name" value="{{ __('Full Names') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" autocomplete="off" wire:model.defer="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" autocomplete="off" wire:model.defer="email" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-input id="telefono" class="block mt-1 w-full" type="text" autocomplete="off" wire:model.defer="telefono" />
                <x-input-error for="telefono" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="profesion" value="{{ __('Profesión') }}" />
                <x-input id="profesion" class="block mt-1 w-full" type="text" autocomplete="off" wire:model.defer="profesion" />
                <x-input-error for="profesion" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="descripcion" value="{{ __('Más detalles') }}" />
                <x-textarea id="descripcion" class="block mt-1 w-full" type="text" autocomplete="off" wire:model.defer="descripcion"
                placeholder="Agrega más detalles del proyectista." />
                <x-input-error for="descripcion" class="mt-2" />
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
</div>
