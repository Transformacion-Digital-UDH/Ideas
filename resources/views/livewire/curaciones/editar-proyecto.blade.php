<div>
    <form>
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
        <div class="mt-8 text-right">
            <x-button type="button" class="ml-2" wire:click="actualizarProyecto" wire:loading.attr="disabled">
                Actualizar para Proyecto
            </x-button>
        </div>
    </form>
</div>