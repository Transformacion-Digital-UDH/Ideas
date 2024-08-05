<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-6">
        @foreach ($necesidades as $necesidad)
            <div class="bg-white shadow-sm rounded-lg p-6 flex justify-between items-center card-item">
                <div class="w-full">
                    <h3 class="text-lg font-medium mb-2 text-blue-950">{{ $necesidad->nec_titulo }}</h3>
                    <p class="text-gray-500 mb-4 line-clamp-3">{{ $necesidad->nec_descripcion }}</p>
                    <div class="flex justify-between items-end mt-2">
                        <div class="text-gray-400 text-sm font-bold block md:flex">
                            <x-com_proceso :status="$necesidad->nec_proceso" />
                            <p class="pl-3 pt-1">Registrado el {{ $necesidad->nec_created->format('d/m/Y') ?? '' }}</p>
                        </div>
                        <div>
                            <button wire:click="verNecesidad({{ $necesidad->nec_id }})"
                                class="middle px-2 py-1 bg-cyan-500 border text-cyan-600 rounded-lg hover:bg-cyan-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <i class="fas fa-eye text-white"></i>
                            </button>
                            @if ($necesidad->nec_proceso == 'Pendiente')
                                <button wire:click="editarNecesidad({{ $necesidad->nec_id }})"
                                    class="middle px-2 py-1 bg-lime-600 border border-lime-600 text-lime-600 rounded-lg hover:bg-lime-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-edit text-white"></i>
                                </button>
                                <button wire:click="eliminarNecesidad({{ $necesidad->nec_id }})"
                                    class="middle px-2 py-1 bg-red-600 border border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-trash text-white"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
