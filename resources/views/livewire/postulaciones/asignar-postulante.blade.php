<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">

        <x-slot name="title">
            <h2 class="text-md">{{ $propuesta->pro_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-base text-gray-400">{{ $propuesta->pro_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="text-base font-bold pb-3">Lista de postulantes</h3>

                <table
                    class="w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Nombres completos</th>
                            <th class="px-6 py-3">Correo</th>
                            <th class="px-6 py-3 text-center">
                                @if ($existeAsigando)
                                    Estado
                                @else
                                    Acción
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($propuesta->postulantes->count() > 0)
                            @foreach ($propuesta->postulantes as $postulacion)
                                <div class="border-green-400 border-1">
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                            <b>{{ $postulacion->name }}</b><br>
                                            {{ $postulacion->email }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                            {{ fechaHora($postulacion->pivot->pos_created) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md text-center">
                                            @if ($existeAsigando)
                                                @if ($postulacion->pivot->pos_asignado == 1)
                                                    <span class="bg-green-600 px-2 py-1 rounded-full text-white">
                                                        <i class="fa-solid fa-check"></i>
                                                        Asignado
                                                    </span>
                                                @else
                                                    <span class="bg-red-600 px-2 py-1 rounded-full text-white">
                                                        <i class="fa-solid fa-xmark mr-1"></i>
                                                        Denegado
                                                    </span>
                                                @endif
                                            @else
                                                @if ($confirmar)
                                                    <x-button-icon class="px-2 h-7 bg-red-500 uppercase"
                                                        wire:click="cancelar">
                                                        X
                                                    </x-button-icon>
                                                    <x-button-icon class="px-2 h-7 ml-2 bg-udh_3 uppercase"
                                                        wire:click="asignarPostulante('{{ $postulacion->pivot->pos_id }}')">
                                                        <i class="fas fa-check mr-2"></i>
                                                        Confirmar
                                                    </x-button-icon>
                                                @else
                                                    <x-button-icon class="px-2 h-7 bg-udh_3"
                                                        wire:loading.attr="disabled" wire:click="confirmacion">
                                                        Asignar
                                                    </x-button-icon>
                                                @endif
                                            @endif

                                        </td>
                                    </tr>
                                </div>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3"
                                    class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                    No hay postulantes :)
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cerrarModal" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
