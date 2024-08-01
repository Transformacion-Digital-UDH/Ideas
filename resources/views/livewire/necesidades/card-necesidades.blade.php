<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-6">
        @foreach ($necesidades as $necesidad)
            <div class="bg-white shadow-sm rounded-lg p-6 flex justify-between items-center card-item">
                <div class="w-full">
                    <h3 class="text-lg font-medium mb-2 text-blue-950">{{ $necesidad->nec_titulo }}</h3>
                    <p class="text-gray-500 mb-4 line-clamp-3">{{ $necesidad->nec_descripcion }}</p>
                    <div class="flex justify-between items-end mt-2">
                        <p class="text-gray-400 text-sm font-bold">Publicado el
                            {{ $necesidad->nec_created->format('Y-m-d') ?? '' }}</p>
                        <div>
                            <button wire:click="verNecesidad({{ $necesidad->nec_id }})"
                                class="bg-blue-100 font-bold text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-200">
                                Ver detalles
                            </button>
                            <button wire:click="eliminarNecesidad({{ $necesidad->nec_id }})"
                                class="bg-red-100 font-bold text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Eliminar
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
</div>
