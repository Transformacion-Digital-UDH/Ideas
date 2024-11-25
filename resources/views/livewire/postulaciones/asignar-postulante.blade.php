<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">

        <x-slot name="title">
            <h2 class="text-base">{{ $propuesta->pro_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-sm">{{ $propuesta->pro_descripcion }}</p>
            </div>

            <hr class="mb-4">

            <h3 class="text-base font-bold pb-3">Responsable</h3>
            <div class="mb-6">
                @if ($existOficial['existe'])
                    <p class="mt-1 text-sm">{{ $existOficial['responsable']->name ?? '-' }}</p>
                    <span class="text-sm text-gray-500">{{ $existOficial['responsable']->email ?? '-' }}</span>
                @else
                    <label class="flex items-center select-none max-w-min whitespace-nowrap">
                        <input type="checkbox" wire:model="tempOficial" wire:change="changeOficial"
                            class="rounded border-gray-300  text-udh_1 shadow-sm focus:text-udh_1">
                        <span
                            class="ms-3 text-sm text-gray-600 dark:text-gray-400">{{ __('Elegir proyecto como oficial') }}</span>
                    </label>
                    <div wire:loading wire:target="changeOficial">
                        <span class="block text-center mt-4">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Cargando...
                        </span>
                    </div>

                    @if ($tempOficial)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4" wire:loading.remove
                            wire:target="changeOficial">
                            <div>
                                <x-select class="block mt-1 w-full" wire:model="responsable_id"
                                    wire:loading.attr="disabled" wire:target="saveResponsable">
                                    <option value="" selected hidden>Seleccionar responsable</option>
                                    @foreach ($responsables as $res)
                                        <option value="{{ $res->id }}">{{ $res->name }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="responsable_id" class="mt-2" />
                            </div>

                            <div class="flex justify-end items-end">
                                <x-button-icon class="px-2 h-7 bg-red-500 uppercase" wire:click="xOficial"
                                    wire:loading.attr="disabled" wire:target="xOficial">
                                    <span wire:loading wire:target="xOficial">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                    <span wire:loading.remove wire:target="xOficial">
                                        X
                                    </span>
                                </x-button-icon>
                                <x-button-icon class="px-2 h-7 ml-2 bg-udh_1 uppercase" wire:click="saveResponsable"
                                    wire:loading.attr="disabled" wire:target="saveResponsable">
                                    <span wire:loading wire:target="saveResponsable">
                                        <i class="fas fa-spinner fa-spin mr-1"></i>
                                        Guardar
                                    </span>
                                    <span wire:loading.remove wire:target="saveResponsable">
                                        <i class="fas fa-check mr-1"></i>
                                        Guardar
                                    </span>
                                </x-button-icon>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <hr class="my-4">

            <div class="overflow-x-auto">
                <h3 class="text-base font-bold pb-3">Lista de postulantes</h3>
                <table
                    class="w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Nombres completos</th>
                            <th class="px-6 py-3">Postulación</th>
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
                            @foreach ($propuesta->postulantes as $key => $postulacion)
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
                                                @if (!empty($confirmar[$key]) && $confirmar[$key] == true)
                                                    <x-button-icon class="px-2 h-7 bg-red-500 uppercase"
                                                        wire:click="cancelar('{{ $key }}')"
                                                        wire:loading.attr="disabled"
                                                        wire:target="cancelar('{{ $key }}')">
                                                        <span wire:loading
                                                            wire:target="cancelar('{{ $key }}')">
                                                            <i class="fas fa-spinner fa-spin"></i>
                                                        </span>
                                                        <span wire:loading.remove
                                                            wire:target="cancelar('{{ $key }}')">
                                                            X
                                                        </span>
                                                    </x-button-icon>
                                                    <x-button-icon class="px-2 h-7 ml-2 bg-udh_1 uppercase"
                                                        wire:click="asignarPostulante('{{ $postulacion->pivot->pos_id }}')"
                                                        wire:loading.attr="disabled"
                                                        wire:target="asignarPostulante('{{ $postulacion->pivot->pos_id }}')">
                                                        <span wire:loading
                                                            wire:target="asignarPostulante('{{ $postulacion->pivot->pos_id }}')">
                                                            <i class="fas fa-spinner fa-spin mr-1"></i>
                                                            Confirmar
                                                        </span>
                                                        <span wire:loading.remove
                                                            wire:target="asignarPostulante('{{ $postulacion->pivot->pos_id }}')">
                                                            <i class="fas fa-check mr-1"></i>
                                                            Confirmar
                                                        </span>
                                                    </x-button-icon>
                                                @else
                                                    <x-button-icon class="px-2 h-7 bg-udh_3"
                                                        wire:click="confirmacion('{{ $key }}')"
                                                        wire:loading.attr="disabled"
                                                        wire:target="confirmacion('{{ $key }}')">
                                                        <span wire:loading
                                                            wire:target="confirmacion('{{ $key }}')">
                                                            <i class="fas fa-spinner fa-spin px-4"></i>
                                                        </span>
                                                        <span wire:loading.remove
                                                            wire:target="confirmacion('{{ $key }}')">
                                                            Asignar
                                                        </span>
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
