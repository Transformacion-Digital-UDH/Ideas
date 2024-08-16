<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-xl">Reportar avance</h2>
        </x-slot>
        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-gray-400 text-base">Linea de tiempo del proyecto</p>
            </div>
            <div class="mt-5 pl-2 sm:pl-5">
                <ol class="relative border-s border-gray-200 dark:border-gray-700">
                    @foreach ($procesos as $proceso)
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute flex items-center bg-gray-50 justify-center w-6 h-6 border rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                @php
                                    $bandera = false;
                                    $fecha = '';
                                    $nexEstado = '';
                                @endphp
                                @foreach ($reportes as $reporte)
                                    @if ($proceso->est_nombre == $reporte->estado_nuevo)
                                        @if ($reporte->estado_nuevo == $reporte->propuesta->pro_proceso)
                                            <i class="fa-solid fa-flag text-red-500"></i>
                                            @php
                                                $nexEstado = $proceso->est_siguiente;
                                                if (!empty($nexEstado)) {
                                                    $bandera = true;
                                                }
                                            @endphp
                                        @else
                                            <i class="fas fa-check text-green-500"></i>
                                        @endif
                                        @php
                                            $fecha = $reporte->rep_created;
                                        @endphp
                                    @endif
                                @endforeach
                            </span>
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $proceso->est_nombre }}
                            </h3>
                            @if (!empty($fecha))
                                <i class="block mb-2 text-sm font-normal leading-none text-gray-800 dark:text-gray-500">
                                    Fecha:
                                    {{ $fecha->format('d-m-Y') }}
                                </i>
                            @endif
                            <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                {{ $proceso->est_descripcion }}
                            </p>
                            @if ($bandera)
                                @if ($confimar)
                                    <x-button-icon class="px-4 py-2 ml-4 bg-red-500 uppercase" wire:click="cancelar">
                                        X
                                    </x-button-icon>
                                    <x-button-icon class="px-4 py-2 ml-4 bg-udh_3 uppercase"
                                        wire:click="confirmar('{{ $nexEstado }}')">
                                        <i class="fas fa-check mr-2"></i>
                                        Confirmar
                                    </x-button-icon>
                                @else
                                    <x-button-icon class="px-4 py-2 bg-udh_1 uppercase" wire:click="completar">
                                        <i class="fas fa-check mr-2"></i>
                                        @if ($propuesta->pro_proceso == 'Asignado')
                                            Iniciar proyecto
                                        @else
                                            Completar
                                        @endif
                                    </x-button-icon>
                                @endif
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cerrarReporte" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
