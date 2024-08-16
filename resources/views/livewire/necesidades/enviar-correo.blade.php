<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-base">Notificar al correo</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Asunto</label>
                    <input type="text" id="subject" wire:model="subject" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                </div>

                <div class="mt-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">Mensaje</label>
                    <textarea id="message" wire:model="message" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm"></textarea>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
            <x-button wire:click="enviarCorreo" wire:loading.attr="disabled" class="ml-2">
                Enviar Correo
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
