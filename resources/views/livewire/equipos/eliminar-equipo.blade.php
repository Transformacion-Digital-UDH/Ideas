<x-dialog-modal maxWidth="md" wire:model="showModal">
    <x-slot name="content">
        <div class="overflow-y-auto">
            <div class="flex gap-x-4 md:gap-x-7 pb-3">
                <span
                    class="flex-shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </span>
                <div class="grow">
                    <h3 class="mb-2 text-lg font-bold text-udh_3 dark:text-neutral-200"> Eliminar equipo </h3>
                    <p class="text-gray-500 dark:text-neutral-500 text-md"> Estas a punto de eliminar al equipo
                        <b class="text-udh_3">{{ $equipo->equ_nombre }}</b>.
                        Presione <b class="text-udh_3">eliminar</b> si desea continuar.
                    </p>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
            Cancelar
        </x-secondary-button>
        <x-button wire:click="confirmarDelete"
            class="ml-2 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Eliminar
        </x-button>
    </x-slot>
</x-dialog-modal>
