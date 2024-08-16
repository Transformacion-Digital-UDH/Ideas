<div>
    <div class="relative overflow-x-auto">
        <table
            class="table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">N°</th>
                    <th scope="col" class="px-6 py-3">Proyectista</th>
                    <th scope="col" class="px-6 py-3">teléfono</th>
                    <th scope="col" class="px-6 py-3">Correo</th>
                    <th scope="col" class="px-6 py-3 text-center">Registro</th>
                    <th scope="col" class="px-6 py-3 text-center">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectistas as $i => $proyectista)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $proyectistas->total() - ($proyectistas->perPage() * ($proyectistas->currentPage() - 1)) - $i }}
                        </th>
                        <td class="px-6 py-4">
                            <strong class="text-gray-900">{{ $proyectista->name }}</strong>
                        </td>
                        <td class="px-6 py-4">
                            {{ $proyectista->telefono }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $proyectista->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            {{ $proyectista->created_at->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <x-estadoItem :status="$proyectista->estado" />
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <x-button-icon class="px-2 h-7 bg-udh_1" wire:loading.attr="disabled"
                                wire:click="abrirModalVer({{ $proyectista->id }})">
                                <i class="fa-solid fa-eye"></i>
                            </x-button-icon>
                            <x-button-icon class="px-2 h-7 bg-udh_3" wire:loading.attr="disabled"
                                wire:click="abrirModal({{ $proyectista->id }})">
                                <i class="fa-solid fa-pencil"></i>
                            </x-button-icon>
                            <x-button-icon class="px-2 h-7 bg-red-600" wire:loading.attr="disabled"
                                wire:click="eliminarProyectista({{ $proyectista->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </x-button-icon>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $proyectistas->links() }}
    </div>
</div>
