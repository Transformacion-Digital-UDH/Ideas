<div class="bg-white bordershadow-md rounded-md lg:col-span-2">
    <div class="flex justify-between mb-4 items-start">
        <div class="font-medium">Propuestas</div>
        <div class="dropdown">
            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600">
                <i class="fa fa-download" aria-hidden="true"></i></button>
            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                <li>
                    <a href="#"
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">PPF</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Excel</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table_id divide-y divide-gray-200 w-full min-w-[460px]">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-600">ID</th>
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-600">Título</th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600">Curador</th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600">Proyectista</th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-600">Tipo</th>
                    <th scope="col" class="text-sm font-normal text-center text-gray-600">Fecha</th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center text-gray-600">Estado</th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center text-gray-600">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($propuestas as $propuesta)
                    <tr>
                        <td class="text-center">{{ $propuesta->pro_id }}</td>
                        <td class="px-4 py-4 text-sm font-normal text-wrap">{{ $propuesta->pro_titulo }}</td>
                        <td class="px-4 py-4 text-sm">{{ $propuesta->curador->name ?? 'N/A' }}</td>
                        <td class="px-4 py-4 text-sm">{{ $propuesta->proyectista->proy_nombres ?? 'N/A' }}</td>
                        <td class="px-4 py-4 text-sm">{{ $propuesta->pro_tipo }}</td>
                        <td class="px-4 py-4 text-sm text-center font-medium whitespace-nowrap">{{ \Carbon\Carbon::parse($propuesta->pro_created)->format('d/m/Y') }}</td>
                        <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                            @if ($propuesta->pro_estado == 1)
                                <span class="inline px-3 py-1 text-sm font-normal rounded-full text-black gap-x-2 bg-amber-100/60">En Espera</span>
                            @elseif ($propuesta->pro_estado == 2)
                                <span class="inline px-3 py-1 text-sm font-normal rounded-full text-black gap-x-2 bg-lime-100/60">En Proceso</span>
                            @else
                                <span class="inline px-3 py-1 text-sm font-normal rounded-full text-black gap-x-2 bg-gray-100">Completada</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-sm text-center whitespace-nowrap">
                            <button class="text-blue-500 hover:text-blue-700" wire:click="abrirModal({{ $propuesta->pro_id }})">
                                Ver
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
