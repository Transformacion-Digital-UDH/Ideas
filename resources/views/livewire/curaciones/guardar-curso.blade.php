<div>
    <form>
        <div class="mt-5">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_titulo"
                placeholder="Ingrese un título tentativo" />
            <x-input-error for="pro_titulo" class="mt-2" />
        </div>
        <div class="mt-5">
            <x-textarea class="block mt-1 w-full" wire:model.defer="problematicas"
                placeholder="Ingresa el problema a tratar." />
            <x-input-error for="problematicas" class="mt-2" />
        </div>
        <div class="mt-5">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_tratar"
                placeholder="Problematica a tratar" />
            <x-input-error for="pro_tratar" class="mt-2" />
        </div>
        <div class="mt-5">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_lugar"
                placeholder="Ingrese el lugar de aplicación" />
            <x-input-error for="pro_lugar" class="mt-2" />
        </div>
        <div class="mt-5">
            <x-textarea class="block mt-1 w-full" wire:model.defer="pro_descripcion"
                placeholder="Agrega una descripción para la propuesta." />
            <x-input-error for="pro_descripcion" class="mt-2" />
        </div>
        <div class="mt-6 text-right">
            <x-button class="ml-2" wire:click="actualizar" wire:loading.attr="disabled">
                Curar para Curso
            </x-button>
        </div>
    </form>
</div>