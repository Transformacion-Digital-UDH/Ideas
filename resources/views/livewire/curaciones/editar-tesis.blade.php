<div>
    <form>
        <div class="mt-4">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_lugar"
                placeholder="Dónde se va a implementar" />
            <x-input-error for="pro_lugar" class="mt-2" />
        </div>
        <div class="mt-2">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_beneficiarios"
                placeholder="A quiénes va a beneficiar" />
            <x-input-error for="pro_beneficiarios" class="mt-2" />
        </div>
        <div class="mt-2">
            <x-textarea class="block mt-1 w-full" rows="2" wire:model.defer="problematicas"
                placeholder="Problematica a tratar" />
            <x-input-error for="problematicas" class="mt-2" />
        </div>
        <div class="mt-2">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_causas"
                placeholder="Cuáles son las causas" />
            <x-input-error for="pro_causas" class="mt-2" />
        </div>
        <div class="mt-2">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_consecuencias"
                placeholder="Cuáles son las consecuencias" />
            <x-input-error for="pro_consecuencias" class="mt-2" />
        </div>
        <div class="mt-2">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_aportes"
                placeholder="Ingrese posibles aportes" />
            <x-input-error for="pro_aportes" class="mt-2" />
        </div>

        <hr class="my-4 border border-blue-600">

        <div class="mt-4">
            <x-input class="block mt-1 w-full" type="text" wire:model.defer="pro_titulo"
                placeholder="Ingrese un título tentativo" />
            <x-input-error for="pro_titulo" class="mt-2" />
        </div>

        <div class="flex flex-wrap">
            <div class="w-full lg:w-3/6 lg:pr-3">
                <div class="mt-2">
                    <x-input class="block mt-1 w-full" type="text" wire:model.defer="variable_1"
                        placeholder="Variable 1" />
                    <x-input-error for="variable_1" class="mt-2" />
                </div>
            </div>
            <div class="w-full lg:w-3/6">
                <div class="mt-2">
                    <x-input class="block mt-1 w-full" type="text" wire:model.defer="variable_2"
                        placeholder="Variable 2" />
                    <x-input-error for="variable_2" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="mt-2">
            <x-textarea class="block mt-1 w-full" rows="2"  wire:model.defer="pro_descripcion"
                placeholder="Agrega una descripción para la propuesta." />
            <x-input-error for="pro_descripcion" class="mt-2" />
        </div>

        <div class="mt-6 text-right">
            <x-button type="button" class="ml-2" wire:click="actualizarProyecto" wire:loading.attr="disabled">
                Actualizar para Tesis
            </x-button>
        </div>
    </form>
</div>
