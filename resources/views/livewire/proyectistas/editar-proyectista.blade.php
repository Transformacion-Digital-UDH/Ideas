<div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            Editar Proyectista
        </x-slot>

        <x-slot name="content">
            <div class="mt-6">
                <x-label for="proy_nombres" value="{{ __('Nombres') }}" />
                <x-input id="proy_nombres" class="block mt-1 w-full" type="text" wire:model.defer="proy_nombres" />
                <x-input-error for="proy_nombres" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="proy_email" value="{{ __('Email') }}" />
                <x-input id="proy_email" class="block mt-1 w-full" type="email" wire:model.defer="proy_email" />
                <x-input-error for="proy_email" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="proy_telefono" value="{{ __('Teléfono') }}" />
                <x-input id="proy_telefono" class="block mt-1 w-full" type="text" wire:model.defer="proy_telefono" />
                <x-input-error for="proy_telefono" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="proy_profesion" value="{{ __('Profesión') }}" />
                <x-input id="proy_profesion" class="block mt-1 w-full" type="text" wire:model.defer="proy_profesion" />
                <x-input-error for="proy_profesion" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="proy_descripcion" value="{{ __('Más detalles') }}" />
                <x-textarea id="proy_descripcion" class="block mt-1 w-full" type="text" wire:model.defer="proy_descripcion"
                placeholder="Agrega más detalles del proyectista." />
                <x-input-error for="proy_descripcion" class="mt-2" />
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
