<div>
    <section x-data="{
        openFaq1: true,
        openFaq2: true,
        toggleFaq1() {
            this.openFaq1 = !this.openFaq1;
            if (!this.openFaq1 && !this.openFaq2) {
                this.openFaq2 = true;
            }
        },
        toggleFaq2() {
            this.openFaq2 = !this.openFaq2;
            if (!this.openFaq1 && !this.openFaq2) {
                this.openFaq1 = true;
            }
        }
    }">

        <div class="mx-auto  {{ $los_dos ? 'max-w-screen-2xl' : 'max-w-4xl' }}">
            @if ($es_responsable || $es_proyecto)
                <div class="grid gap-6 {{ $los_dos ? 'md:grid-cols-2' : 'grid-col-1' }}">
                    @if ($es_responsable)
                        <div>
                            @if ($es_responsable)
                                <div class="mb-3 w-full bg-udh_3 text-white flex justify-between items-center cursor-pointer select-none rounded-md"
                                    @click="toggleFaq1">
                                    <h3 class="text-lg font-bold px-3 py-2">Soy Responsable</h3>
                                    <i class="fa-solid fa-chevron-down px-3 py-2" :class="openFaq1 && 'rotate-180'"></i>
                                </div>
                            @endif
                            <div class="grid grid-cols-1 gap-3" x-show="openFaq1">
                                @if (count($responsables) > 0)
                                    @foreach ($responsables as $necesidad)
                                        <div
                                            class="bg-white shadow-sm rounded-lg p-3 flex justify-between items-center card-item last:mb-6">
                                            <div class="w-full">
                                                <div class="flex justify-between items-center">
                                                    <p class="text-sm font-medium mb-1 text-blue-950">
                                                        {{ $necesidad->nec_tipo }}: {{ $necesidad->nec_entidad }}
                                                    </p>
                                                    <p class="text-gray-400 text-xs font-bold hidden sm:block">
                                                        Registrado el
                                                        {{ $necesidad->nec_created->format('d/m/Y') ?? '' }}</p>
                                                </div>
                                                <span class="text-sm font-medium mb-1 text-blue-950">Necesidad:</span>
                                                <p class="text-gray-500 line-clamp-3 text-sm">
                                                    {{ $necesidad->nec_titulo }}
                                                </p>
                                                <div class="flex justify-between mt-2 items-center">
                                                    <div class="text-gray-400 text-sm font-bold">
                                                        <x-estadoInterno :status="$necesidad->nec_proceso" />
                                                    </div>
                                                    <div>
                                                        <x-button-icon class="px-2 h-6 bg-udh_1 uppercase"
                                                            wire:loading.attr="disabled"
                                                            wire:click='verResponsable({{ $necesidad->nec_id }})'>
                                                            <i class="fas fa-eye text-white"></i>
                                                        </x-button-icon>
                                                        <x-button-icon class="px-2 h-6 bg-gray-500 uppercase"
                                                            wire:loading.attr="disabled"
                                                            wire:click='verPropuestas({{ $necesidad->nec_id }})'>
                                                            Propuestas
                                                        </x-button-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="bg-white shadow-sm rounded-lg p-6">
                                        <i class="text-udh_3 text-right">¡Aún no te asignaron proyectos! 😊</i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if ($es_proyecto)
                        <div>
                            @if ($es_responsable)
                                <div class="mb-3 w-full bg-udh_3 text-white flex justify-between items-center cursor-pointer select-none rounded-md"
                                    @click="toggleFaq2">
                                    <h3 class="text-lg font-bold px-3 py-2">Mis Proyectos</h3>
                                    <i class="fa-solid fa-chevron-down px-3 py-2" :class="openFaq2 && 'rotate-180'"></i>
                                </div>
                            @endif
                            <div class="grid grid-cols-1 gap-3" x-show="openFaq2">
                                @if (count($proyectos) > 0)
                                    @foreach ($proyectos as $post)
                                        <div
                                            class="bg-white shadow-sm rounded-lg p-3 flex justify-between items-center card-item">
                                            <div class="w-full">
                                                @isset($post->propuesta->es_oficial)
                                                    <span class="text-white text-xs rounded-md bg-udh_1 px-1 py-[2px] mb-2">
                                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                                        Proyecto oficial
                                                    </span>
                                                @endisset
                                                <div class="flex justify-between items-center">
                                                    <p class="text-sm font-medium mb-1 text-blue-950">
                                                        Responsable:
                                                        {{ $post->propuesta->necesidad->responsable->name ?? 'POR DEFINIR' }}
                                                    </p>
                                                    <p class="text-gray-400 text-xs font-bold hidden sm:block">
                                                        Asignado el
                                                        {{ $post->pos_created->format('d/m/Y') ?? '' }}</p>
                                                </div>

                                                <p class="text-gray-500 line-clamp-3 text-sm pb-1">
                                                    {{ $post->propuesta->pro_titulo }}
                                                </p>
                                                @if (isset($post->equipo->equ_nombre))
                                                    <p class="text-gray-500 line-clamp-3 text-sm">
                                                        <i class="fa-solid fa-chalkboard-user text-[10px]"></i>
                                                        {{ $post->equipo->equ_nombre }}
                                                        @isset($post->pos_seccion)
                                                            ({{ $post->pos_seccion }})
                                                        @endisset
                                                    </p>
                                                @endif
                                                <div class="flex justify-between items-center mt-1">
                                                    <div class="text-gray-400 text-sm font-bold mt-1">
                                                        <x-estadoInterno :status="$post->propuesta->pro_proceso" />
                                                    </div>
                                                    <div class="text-right mt-2 sm:mt-1">
                                                        <x-button-icon class="px-2 h-6 bg-udh_1 uppercase"
                                                            wire:loading.attr="disabled"
                                                            wire:click='verProyecto({{ $post->pos_id }})'>
                                                            <i class="fas fa-eye text-white"></i>
                                                        </x-button-icon>
                                                        @if ($post->propuesta->pro_proceso != 'Postulación')
                                                            <x-button-icon class="px-2 h-6 bg-udh_3 uppercase"
                                                                wire:click="reportarEstado({{ $post->propuesta->pro_id }})">
                                                                Reportar
                                                            </x-button-icon>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="bg-white shadow-sm rounded-lg p-6">
                                        <i class="text-udh_3 text-right">¡No tiene proyectos por el momento! 😊</i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <i class="text-udh_3 text-right">¡No tiene proyectos por el momento! 😊</i>
                </div>
            @endif
        </div>

    </section>

</div>
