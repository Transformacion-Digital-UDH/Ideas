<div class="relative overflow-x-auto">
    <table class="table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">N°</th>
                <th scope="col" class="px-6 py-3">Solicitante</th>
                <th scope="col" class="px-6 py-3">Necesidad</th>
                <th scope="col" class="px-6 py-3">Registro</th>
                <th scope="col" class="px-6 py-3">Financiamiento</th>
                <th scope="col" class="px-6 py-3 text-left">Estado</th>
                <th scope="col" class="px-6 py-3 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($necesidades as $necesidad)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $necesidad->nec_id }}
                    </th>
                    <td class="px-6 py-4">
                        <strong class="text-gray-900">{{ $necesidad->nec_tipo }}</strong>
                        <br>{{ $necesidad->nec_entidad }}
                        {{ $necesidad->solicitante }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $necesidad->nec_titulo }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $necesidad->nec_created->format('Y-m-d') }}<br>
                        {{ $necesidad->nec_created->format('H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <x-estadoFinanciamiento :status="$necesidad->es_financiado" />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-left">
                        <x-estadoInterno :status="$necesidad->nec_proceso" />
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap">
                        <x-button-icon class="px-2 h-7 bg-udh_3" wire:loading.attr="disabled"
                            wire:click='abrirModal({{ $necesidad->nec_id }})'>
                            Curar
                        </x-button-icon>
                        <x-button-icon class="px-2 h-7 bg-udh_1" wire:loading.attr="disabled"
                            wire:click='verNecesidad({{ $necesidad->nec_id }})'>
                            <i class="fas fa-eye text-white"></i>
                        </x-button-icon>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
