<div>
    <form>
        <div class="mt-5">
            <x-textarea class="block mt-1 w-full" wire:model="pro_titulo" rows="2"
                placeholder="Título del proyecto de curso." />
            <x-input-error for="pro_titulo" class="mt-2" />
        </div>
        <div class="mt-5">
            <x-input class="block mt-1 w-full" type="text" wire:model="pro_lugar"
                placeholder="Lugar de ejecución." />
            <x-input-error for="pro_lugar" class="mt-2" />
        </div>
        <div class="mt-5">
            <x-textarea class="block mt-1 w-full" wire:model="pro_descripcion" rows="7"
                placeholder="Descripción del proyecto de curso." />
            <x-input-error for="pro_descripcion" class="mt-2" />
        </div>
        <div class="mt-6 text-right">
            <x-button type="button" class="ml-2" wire:click="curarNecesidad" wire:loading.attr="disabled">
                Curar para Curso
            </x-button>
        </div>
    </form>
</div>
