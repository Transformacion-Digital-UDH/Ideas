<div>
    <x-dialog-modal wire:model="showModal" maxWidth="4xl">

            <x-slot name="title">
                <h2 class="text-xl">{{ $postulantes->first()->propuesta?->id }}</h2>
            </x-slot>

            <x-slot name="content">
                <div class="mb-7">
                    <p class="mt-1 text-base text-gray-400"></p>
                </div>
                <div class="overflow-x-auto">
                    <h3 class="text-base font-bold text-udh_1">Detalles de las Postulaciones</h3>
                    <table class="min-w-full bg-white">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($postulantes as $postulacion)
                                <div class="border-green-400 border-1">
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Justificación</td>
                                    <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                        {{ $postulacion->pos_justificar ?? 'No disponible' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Asignado</td>
                                    <td class="px-6 py-4 whitespace-normal text-md ">
                                        <span class="px-4 py-1 font-bold text-green-700 bg-green-100 rounded-lg">
                                            {{  $postulacion->pos_asignado ?? 'No asignado' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Postulante</td>
                                    <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                        {{ $postulacion->postulante->name ?? 'N/A' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-800 whitespace-normal text-md">Asignar</td>
                                    <td class="px-6 py-4 text-gray-600 whitespace-normal text-md">
                                        @if($postulacion->pos_asignado ?? false)
                                            <span class="font-bold text-green-600">Asignado</span>
                                        @else
                                            <button wire:click="asignarPostulacion({{ $postulacion->pos_id ?? null }})"
                                                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                                Asignar
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
