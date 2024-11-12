<div class="">
    @if ($propuestas->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach ($propuestas as $propuesta)
                <div class="card-item bg-white shadow-lg rounded-lg p-6 flex justify-between items-center">
                    <div class="w-full">
                        <h3 class="text-md sm:text-lg font-medium mb-2 text-blue-950">
                            {{ $propuesta->pro_titulo }}
                        </h3>
                        <p class="text-gray-500 text-sm sm:text-md mb-4 line-clamp-3">
                            {{ $propuesta->pro_descripcion }}
                        </p>
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mt-2">
                            <p class="text-gray-500 text-sm font-bold">
                                Publicado el
                                {{ $propuesta->pro_created->format('d-m-Y') ?? '' }}
                            </p>

                            <div class="mt-4 sm:mt-0">
                                <x-secondary-button wire:click="abrirModalVer({{ $propuesta->pro_id }})"
                                    wire:loading.attr="disabled" wire:target="abrirModalVer({{ $propuesta->pro_id }})">
                                    <span wire:loading wire:target="abrirModalVer({{ $propuesta->pro_id }})">
                                        <i class="fas fa-spinner fa-spin mr-1"></i> Cargando
                                    </span>
                                    <span wire:loading.remove wire:target="abrirModalVer({{ $propuesta->pro_id }})">
                                        Ver detalles
                                    </span>
                                </x-secondary-button>
                                @if (in_array($propuesta->pro_id, $postulaciones_ids))
                                    <x-button-link class="ml-2 !bg-udh_1 px-3" href="{{ route('mis-postulaciones') }}">
                                        Seguimiento
                                    </x-button-link>
                                @else
                                    <x-button class="ml-2 bg-udh_1"
                                        wire:click="abrirModalPostular({{ $propuesta->pro_id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="abrirModalPostular({{ $propuesta->pro_id }})">
                                        <span wire:loading wire:target="abrirModalPostular({{ $propuesta->pro_id }})">
                                            <i class="fas fa-spinner fa-spin mr-1"></i> Cargando
                                        </span>
                                        <span wire:loading.remove
                                            wire:target="abrirModalPostular({{ $propuesta->pro_id }})">
                                            Postular
                                        </span>
                                    </x-button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <p class="pb-3">Hola, <b class="text-udh_3">{{ auth()->user()->name }}</b>!</p>
                <p class="pb-5">
                    Actualmente no hay propuestas disponibles para postularse.
                </p>
                <i class="text-udh_3 text-right">¡Vuelva pronto! 🌟</i>
            </div>
        </div>
    @endif

</div>
