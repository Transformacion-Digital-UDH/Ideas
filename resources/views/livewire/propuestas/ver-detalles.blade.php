<div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            Detalles
        </x-slot>

        <x-slot name="content">
            Detalles de la propuesta <br>
            <pre>
                {{ $propuesta->pro_titulo }}
            </pre>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', null)" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
