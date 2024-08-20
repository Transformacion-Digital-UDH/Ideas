<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">

        <x-slot name="title">
            <h2 class="text-md">{{ $propuesta->pro_titulo }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mb-7">
                <p class="mt-1 text-base text-gray-400">{{ $propuesta->pro_descripcion }}</p>
            </div>
            <div class="overflow-x-auto">
                <h3 class="text-base font-bold pb-3">Responsable</h3>
                <div class="mb-4">
                    <label class="flex items-center select-none max-w-min whitespace-nowrap">
                        <input type="checkbox" wire:model="oficial" wire:change="changeOficial"
                            class="rounded border-gray-300  text-udh_1 shadow-sm focus:text-udh_1">
                        <span
                            class="ms-3 text-sm text-gray-600 dark:text-gray-400">{{ __('Elegir como proyecto oficial') }}</span>
                    </label>
                </div>
                @if ($oficial)
                    <div class="mb-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <x-label value="Responsable" for="responsable"
                                    class="block text-sm font-medium text-gray-700" />

                                <div class="relative text-black" x-data="selectmenu(datalist())" @click.away="close()">
                                    <input type="text" x-model="selectedkey" name="selectfield" id="selectfield"
                                        class="hidden">
                                    <span class="inline-block w-full rounded-md shadow-sm"
                                        @click="toggle(); $nextTick(() => $refs.filterinput.focus());">
                                        <button
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                            <span class="block truncate"
                                                x-text="selectedlabel ?? 'Please Select'"></span>

                                            <span
                                                class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <i class="fa-solid fa-chevron-down text-gray-400 w-5 text-xs"></i>
                                            </span>
                                        </button>
                                    </span>

                                    <div x-show="state"
                                        class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg p-2">
                                        <input type="text"
                                            class="w-full rounded-md py-1 px-2 mb-1 border border-gray-400"
                                            x-model="filter" x-ref="filterinput">
                                        <ul
                                            class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs max-h-40 focus:outline-none sm:text-sm sm:leading-5">

                                            <template x-for="(value, key) in getlist()" :key="key">

                                                <li @click="select(value, key)"
                                                    :class="{ 'bg-gray-100': isselected(key) }"
                                                    class="relative py-1 pl-3 mb-1 text-gray-900 select-none pr-9 hover:bg-gray-100 cursor-pointer rounded-md">
                                                    <span x-text="value" class="block font-normal truncate"></span>

                                                    <span x-show="isselected(key)"
                                                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-700">
                                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end items-end">
                                <x-button-icon class="px-2 h-7 bg-red-500 uppercase" wire:click="cancelar">
                                    X
                                </x-button-icon>
                                <x-button-icon class="px-2 h-7 ml-2 bg-udh_3 uppercase"
                                    wire:click="asignarPostulante('p')">
                                    <i class="fas fa-check mr-2"></i>
                                    Confirmar
                                </x-button-icon>
                            </div>
                        </div>
                    </div>
                @endif


                <h3 class="text-base font-bold pb-3">Lista de postulantes</h3>
                <table
                    class="w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Nombres completos</th>
                            <th class="px-6 py-3">Correo</th>
                            <th class="px-6 py-3 text-center">
                                @if ($existeAsigando)
                                    Estado
                                @else
                                    Acción
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($propuesta->postulantes->count() > 0)
                            @foreach ($propuesta->postulantes as $postulacion)
                                <div class="border-green-400 border-1">
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                            <b>{{ $postulacion->name }}</b><br>
                                            {{ $postulacion->email }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                            {{ fechaHora($postulacion->pivot->pos_created) }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md text-center">
                                            @if ($existeAsigando)
                                                @if ($postulacion->pivot->pos_asignado == 1)
                                                    <span class="bg-green-600 px-2 py-1 rounded-full text-white">
                                                        <i class="fa-solid fa-check"></i>
                                                        Asignado
                                                    </span>
                                                @else
                                                    <span class="bg-red-600 px-2 py-1 rounded-full text-white">
                                                        <i class="fa-solid fa-xmark mr-1"></i>
                                                        Denegado
                                                    </span>
                                                @endif
                                            @else
                                                @if ($confirmar)
                                                    <x-button-icon class="px-2 h-7 bg-red-500 uppercase"
                                                        wire:click="cancelar">
                                                        X
                                                    </x-button-icon>
                                                    <x-button-icon class="px-2 h-7 ml-2 bg-udh_3 uppercase"
                                                        wire:click="asignarPostulante('{{ $postulacion->pivot->pos_id }}')">
                                                        <i class="fas fa-check mr-2"></i>
                                                        Confirmar
                                                    </x-button-icon>
                                                @else
                                                    <x-button-icon class="px-2 h-7 bg-udh_3"
                                                        wire:loading.attr="disabled" wire:click="confirmacion">
                                                        Asignar
                                                    </x-button-icon>
                                                @endif
                                            @endif

                                        </td>
                                    </tr>
                                </div>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3"
                                    class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">
                                    No hay postulantes :)
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <script>
                function selectmenu(datalist) {
                    return {
                        state: false,
                        filter: '',
                        list: datalist,
                        selectedkey: null,
                        selectedlabel: null,
                        toggle: function() {
                            this.state = !this.state;
                            this.filter = '';
                        },
                        close: function() {
                            this.state = false;
                        },
                        select: function(value, key) {
                            if (this.selectedkey == key) {
                                this.selectedlabel = null;
                                this.selectedkey = null;
                            } else {
                                this.selectedlabel = value;
                                this.selectedkey = key;
                                this.state = false;
                            }
                        },
                        isselected: function(key) {
                            return this.selectedkey == key;
                        },
                        getlist: function() {
                            if (this.filter == '') {
                                return this.list;
                            }
                            var filtered = Object.entries(this.list).filter(([key, value]) => value.toLowerCase().includes(this
                                .filter.toLowerCase()));

                            var result = Object.fromEntries(filtered);
                            return result;
                        }
                    };
                }

                function datalist() {
                    return {
                        AF: 'Afghanistan',
                        AX: 'Aland Islands',
                        AL: 'Albania',
                        DZ: 'Algeria',
                        AS: 'American Samoa',
                        AD: 'Andorra',
                        AO: 'Angola',
                        AI: 'Anguilla',
                        AQ: 'Antarctica',
                        AG: 'Antigua And Barbuda',
                    };
                }
            </script>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cerrarModal" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
