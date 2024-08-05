<div>
    <form>
        <div class="mt-5">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_titulo"
                placeholder="Ingrese un título tentativo" />
            <x-input-error for="pro_titulo" class="mt-2" />
        </div>
        <div class="mt-5">
            <x-select wire:model.defer="proy_id" class="block mt-1 w-full">
                <option value="" selected hidden>Seleccione un proyectista...</option>
                @foreach ($proyectistas as $proy)
                    <option value="{{ $proy->proy_id }}">{{ $proy->proy_nombres }}</option>
                @endforeach
            </x-select>
            <x-input-error for="proy_id" class="mt-2" />
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
            <x-button type="button" class="ml-2" wire:click="curarProyecto" wire:loading.attr="disabled">
                Curar para Proyecto
            </x-button>
        </div>
    </form>
</div>
