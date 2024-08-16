<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-base">{{ $necesidad->nec_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-sm text-gray-400">{{ $necesidad->nec_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="font-bold text-md text-udh_1">Historial de propuestas</h3>
                @if (count($propuestas) > 0)
                    @foreach ($propuestas as $propuesta)
                        <div class="px-3 py-2 my-3 border border-gray-300">
                            <div class="flex items-center justify-between">
                                <b>{{ $propuesta->pro_tipo ?? '' }}</b>
                                <p class="text-gray-400 text-xs font-bold hidden sm:block">
                                    Curado el {{ $propuesta->pro_created->format('d/m/Y') }}</p>
                            </div>
                            <p>{{ $propuesta->pro_titulo }}</p>
                            @if (!empty($propuesta->postulante))
                                <p class="text-xs">
                                    <i class="fa fa-user text-[10px] mr-2"></i>
                                    {{ $propuesta->postulante->name ?? '' }}
                                </p>
                            @endif
                            @if (!empty($propuesta->postulante) && $propuesta->pro_tipo == 'Curso')
                                <i class="font-bold text-sm">
                                    {{ $propuesta->equipo->equ_nombre ?? '' }}
                                    @if (!empty($propuesta->seccion))
                                        ({{ $propuesta->seccion }})
                                    @endif
                                </i>
                            @endif
                            <div class="flex items-center justify-between mt-1">
                                <div>
                                    @if ($propuesta->es_oficial)
                                        <span class="text-white text-xs rounded-md bg-udh_1 px-1 py-[2px]">
                                            <i class="fa-solid fa-star text-yellow-400"></i>
                                            Proyecto oficial
                                        </span>
                                    @endif
                                </div>
                                <x-estadoPropuesta :status="$propuesta->pro_proceso" />
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="mt-2 text-sm">No hay propuestas para esta necesidad.</p>
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
