<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-base">{{ $necesidad->nec_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="text-sm">{{ $necesidad->nec_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="font-bold text-md text-udh_1">Historial de propuestas</h3>
                @if (count($propuestas) > 0)
                    @foreach ($propuestas as $propuesta)
                        <div class="px-3 py-2 my-3 border border-gray-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    @if ($propuesta->es_oficial)
                                        <span class="text-white text-xs rounded-md bg-udh_1 px-2 py-1 block mt-1 mr-2">
                                            <i class="fa-solid fa-star text-yellow-400"></i>
                                            Proyecto oficial
                                        </span>
                                    @endif
                                    <b>{{ $propuesta->pro_tipo ?? '' }}</b>
                                </div>
                                <p class="text-gray-400 text-xs font-bold hidden sm:block">
                                    Curado el {{ $propuesta->pro_created->format('d/m/Y') }}</p>
                            </div>
                            <p class="font-medium">{{ $propuesta->pro_titulo }}</p>
                            @if (!empty($propuesta->postulante) && $propuesta->pro_tipo == 'Curso')
                                <p class="text-sm">
                                    <i class="fa-solid fa-book text-[10px] mr-2"></i>
                                    {{ $propuesta->equipo->equ_nombre ?? '' }}
                                    @if (!empty($propuesta->seccion))
                                        ({{ $propuesta->seccion }})
                                    @endif
                                </p>
                            @endif
                            @if (!empty($propuesta->postulante))
                                <p class="text-xs">
                                    <i class="fa fa-user text-[10px] mr-2"></i>
                                    {{ $propuesta->postulante->name ?? '' }}
                                </p>
                                <p class="text-xs">
                                    <i class="fa fa-envelope text-[10px] mr-2"></i>
                                    {{ $propuesta->postulante->email ?? '' }}
                                </p>
                                <p class="text-xs">
                                    <i class="fa fa-phone text-[10px] mr-2"></i>
                                    {{ $propuesta->postulante->telefono ?? '' }}
                                </p>
                            @endif
                            <div class="flex items-center justify-between mt-1">
                                <div class="text-sm">
                                    @if (!empty($propuesta->semestre))
                                       Semestre: {{ $propuesta->semestre }}
                                    @endif
                                </div>
                                <x-estadoPropuesta :status="$propuesta->pro_proceso" />
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="mt-2 text-sm">No hay propuestas para esta idea.</p>
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
