<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-6">
        @foreach ($propuestas as $propuesta)
            <div class="bg-white shadow-sm rounded-lg p-6 flex justify-between items-center">
                <div class="w-full">
                    <h3 class="text-lg font-medium mb-2 text-blue-950">{{ $propuesta->pro_titulo }}</h3>
                    <p class="text-gray-500 mb-4 line-clamp-3">{{ $propuesta->pro_descripcion }}</p>
                    <div class="flex justify-between items-end">
                        <p class="text-gray-400 text-sm font-bold">Publicado el
                            {{ $propuesta->pro_created->format('Y-m-d') ?? '' }}</p>
                        <div>
                            <button wire:click="abrirModalVer({{ $propuesta->pro_id }})"
                                class="bg-blue-100 font-bold text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-200">
                                Ver detalles
                            </button>
                            <button wire:click="abrirModalPostular({{ $propuesta->pro_id }})"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Postular
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
