<div>
    <div class="grid grid-cols-1 gap-6">
        @if (count($necesidades) > 0)
            @foreach ($necesidades as $necesidad)
                <div class="bg-white shadow-sm rounded-lg p-6 flex justify-between items-center card-item">
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
                                <button wire:click="verNecesidad({{ $necesidad->nec_id }})" wire:loading.attr="disabled"
                                    class="middle px-2 py-1 bg-cyan-500 border text-cyan-600 rounded-lg hover:bg-cyan-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-eye text-white"></i>
                                </button>
                                @if ($necesidad->nec_proceso == 'En Espera')
                                    <button wire:click="editarNecesidad({{ $necesidad->nec_id }})"
                                        wire:loading.attr="disabled"
                                        class="middle px-2 py-1 bg-lime-600 border border-lime-600 text-lime-600 rounded-lg hover:bg-lime-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                        <i class="fas fa-edit text-white"></i>
                                    </button>
                                    <button wire:click="eliminarNecesidad({{ $necesidad->nec_id }})"
                                        wire:loading.attr="disabled"
                                        class="middle px-2 py-1 bg-red-600 border border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                        <i class="fas fa-trash text-white"></i>
                                    </button>
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
