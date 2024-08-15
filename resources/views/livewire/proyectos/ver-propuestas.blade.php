<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">
        <x-slot name="title">
            <h2 class="text-base">{{ $necesidad->nec_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-sm text-gray-400">{{ $necesidad->nec_descripcion }}</p>
            </div>
            <pre>
                @php
                    print_r($necesidad->toArray());
                @endphp
            </pre>
            <div class="overflow-x-auto">
                <h3 class="font-bold text-md text-udh_1">Historial de propuestas</h3>
                @if (count($necesidad->propuestas) > 0)
                    @foreach ($necesidad->propuestas as $propuesta)
                        <div class="px-3 py-2 my-3 border border-gray-300">
                            <div class="flex items-center justify-between">
                                <b>{{ $propuesta->pro_tipo }}</b>
                                <p class="text-gray-400 text-xs font-bold hidden sm:block">
                                    Curado el {{ $propuesta->pro_created->format('d/m/Y') }}</p>
                            </div>
                            <p>{{ $propuesta->pro_titulo }}</p>
                            @if ($propuesta->postulantes->count() > 0)
                                <p>
                                    <i class="fa fa-user text-[10px]"></i>
                                    {{ $propuesta->postulantes[0]->name ?? '' }}
                                </p>
                            @endif
                            <div class="flex items-center justify-between">
                                <b>{{ $propuesta->pro_tipo }}</b>
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
