<div>
    <div class="grid grid-cols-1 gap-6">
        @if (count($necesidades) > 0)
            @foreach ($necesidades as $necesidad)
                <div class="bg-white shadow-lg rounded-lg p-6 flex justify-between items-center card-item">
                    <div class="w-full">
                        <div class="flex justify-between items-center">
                            <div></div>
                            <p class="text-gray-400 text-xs sm:text-sm font-bold pb-1">Registrado el
                                {{ $necesidad->nec_created->format('d/m/Y') ?? '' }}</p>
                        </div>

                        <h3 class="text-md sm:text-lg font-medium mb-2 text-blue-950">{{ $necesidad->nec_titulo }}</h3>
                        <p class="text-gray-500 mb-4 line-clamp-3 text-sm">{{ $necesidad->nec_entidad }}</p>
                        <div class="flex justify-between items-end mt-2">
                            <div class="text-gray-400 text-sm font-bold block md:flex">
                                <x-estadoSociedad :status="$necesidad->nec_proceso" />
                            </div>
                            <div>
                                <x-button-icon class="px-2 h-7 bg-udh_1" wire:loading.attr="disabled"
                                    wire:click='verNecesidad({{ $necesidad->nec_id }})'>
                                    <i class="fas fa-eye text-white"></i>
                                </x-button-icon>
                                @if ($necesidad->nec_proceso == 'En Espera')
                                    <x-button-icon class="px-2 h-7 bg-udh_3" wire:loading.attr="disabled"
                                        wire:click='editarNecesidad({{ $necesidad->nec_id }})'>
                                        <i class="fas fa-edit text-white"></i>
                                    </x-button-icon>
                                    <x-button-icon class="px-2 h-7 bg-red-600" wire:loading.attr="disabled"
                                        wire:click='eliminarNecesidad({{ $necesidad->nec_id }})'>
                                        <i class="fas fa-trash text-white"></i>
                                    </x-button-icon>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white shadow-sm rounded-lg p-6">
                <p class="pb-3">¡Bienvenido, <b class="text-udh_3">{{ auth()->user()->name }}</b>!</p>
                <p class="pb-5">Haz clic en el botón <b class="text-udh_3">Agregar Idea</b>
                    para comenzar y compartir lo que necesitas.</p>
                <i class="text-udh_3 text-right">¡Gracias por ser parte de esta comunidad! 🌟</i>
            </div>
        @endif
    </div>
</div>
