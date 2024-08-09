<div>
    <div class="flex justify-center">
        <button wire:click="abrirModal"
            class="middle px-3 py-2 bg-blue-600 text-sm font-bold border text-white rounded-lg hover:bg-blue-700 hover:text-white transition duration-300 ease-in-out transform hover:scale-105">
            Agregar proyectista
        </button>

    </div>
    <x-dialog-modal wire:model="showModal" maxWidth="md">
        <x-slot name="title">
            Agregar Proyectista
        </x-slot>

        <x-slot name="content">
            <div class="mt-6">
                <x-label for="name" value="{{ __('Nombres') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" wire:model="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password" />
                <x-input-error for="password" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-input id="telefono" class="block mt-1 w-full" type="text" wire:model="telefono" />
                <x-input-error for="telefono" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="profesion" value="{{ __('Profesión') }}" />
                <x-input id="profesion" class="block mt-1 w-full" type="text" wire:model="profesion" />
                <x-input-error for="profesion" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-label for="descripcion" value="{{ __('Más detalles') }}" />
                <x-textarea id="descripcion" class="block mt-1 w-full" type="text" wire:model="descripcion"
                    placeholder="Agrega más detalles del proyectista." />
                <x-input-error for="descripcion" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', null)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-2" wire:click="guardar" wire:loading.attr="disabled">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
