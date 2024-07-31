<div>
    <x-modal wire:model="userId">
        <x-slot name="title">
            Editar Usuario
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" value="{{ __('Nombre') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="name" />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" wire:model.defer="email" />
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('userId', null)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="updateUser" wire:loading.attr="disabled">
                Actualizar
            </x-button>
        </x-slot>
    </x-modal>
</div>