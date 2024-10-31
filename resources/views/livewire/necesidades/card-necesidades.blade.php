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
                                @if (isset($necesidad->responsable))
                                    <x-button-icon class="px-2 h-7 bg-red-950"
                                        wire:click="rps({{ $necesidad->responsable_id }})" wire:loading.attr="disabled"
                                        wire:target="rps({{ $necesidad->responsable_id }})">
                                        <span wire:loading wire:target="rps({{ $necesidad->responsable_id }})">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </span>
                                        <span wire:loading.remove wire:target="rps({{ $necesidad->responsable_id }})">
                                            <i class="fas fa-user text-white"></i>
                                        </span>
                                    </x-button-icon>
                                @endif

                                <x-button-icon class="px-2 h-7 bg-udh_1"
                                    wire:click="verNecesidad({{ $necesidad->nec_id }})" wire:loading.attr="disabled"
                                    wire:target="verNecesidad({{ $necesidad->nec_id }})">
                                    <span wire:loading wire:target="verNecesidad({{ $necesidad->nec_id }})">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                    <span wire:loading.remove wire:target="verNecesidad({{ $necesidad->nec_id }})">
                                        <i class="fas fa-eye text-white"></i>
                                    </span>
                                </x-button-icon>

                                @if ($necesidad->nec_proceso == 'En Espera')
                                    <x-button-icon class="px-2 h-7 bg-udh_3"
                                        wire:click="editarNecesidad({{ $necesidad->nec_id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="editarNecesidad({{ $necesidad->nec_id }})">
                                        <span wire:loading wire:target="editarNecesidad({{ $necesidad->nec_id }})">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </span>
                                        <span wire:loading.remove
                                            wire:target="editarNecesidad({{ $necesidad->nec_id }})">
                                            <i class="fas fa-edit text-white"></i>
                                        </span>
                                    </x-button-icon>

                                    <x-button-icon class="px-2 h-7 bg-red-600"
                                        wire:click="eliminarNecesidad({{ $necesidad->nec_id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="eliminarNecesidad({{ $necesidad->nec_id }})">
                                        <span wire:loading wire:target="eliminarNecesidad({{ $necesidad->nec_id }})">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </span>
                                        <span wire:loading.remove
                                            wire:target="eliminarNecesidad({{ $necesidad->nec_id }})">
                                            <i class="fas fa-trash text-white"></i>
                                        </span>
                                    </x-button-icon>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white shadow-sm rounded-lg p-6">
                <p class="pb-3">¡Bienvenido,
                    <b class="text-udh_3">{{ auth()->user()->name }}</b>!
                </p>
                <p class="pb-5">Haz clic en el botón
                    <b class="text-udh_3">Agregar Idea</b>
                    para comenzar y compartir lo que necesitas.
                </p>
                <i class="text-udh_3 text-right">¡Gracias por ser parte de esta comunidad! 🌟</i>
            </div>
        @endif
    </div>

    @if (!empty($necesidad))
        <x-dialog-modal wire:model="showRps" maxWidth="2xl">
            <x-slot name="title">
                <h2 class="text-base">Responsable del proyecto</h2>
            </x-slot>

            <x-slot name="content">
                <p class="mb-3">Agradecemos su confianza puesta en nosotros. El responsable de este proyecto es la
                    persona
                    indicada para atender cualquier consulta o seguimiento sobre su idea.</p>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                    Nombres completos
                                </td>
                                <td class="px-6 py-4 text-gray-800 whitespace-normal text-md">
                                    {{ $responsable->name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                    Correo
                                </td>
                                <td class="px-6 py-4 text-udh_3 whitespace-normal text-md">
                                    <a href="mailto:{{ $responsable->email }}"
                                        class="underline">{{ $responsable->email }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                    Teléfono
                                </td>
                                <td class="px-6 py-4 text-udh_3 whitespace-normal text-md">
                                    <a href="tel:{{ $responsable->telefono }}"
                                        class="underline">{{ $responsable->telefono }}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showRps', false)" wire:loading.attr="disabled">
                    Cerrar
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif
</div>
