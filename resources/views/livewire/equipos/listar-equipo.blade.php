<div>
    <div class="relative overflow-x-auto">
        <table class=" table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Nombre/Tipo</th>
                    <!--<th scope="col" class="px-6 py-3">Descripcion</th>-->
                    <th scope="col" class="px-6 py-3">Ciclo</th>
                    <th scope="col" class="px-6 py-3">Registro</th>
                    <th scope="col" class="px-6 py-3 text-center">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $equipo->equ_codigo }}
                        </td>
                        <td class="px-6 py-4">
                            <strong class="text-gray-900">{{ $equipo->equ_nombre }}</strong>
                            <br>{{ $equipo->equ_tipo }}
                        </td>
                       <!-- <td class="px-6 py-4">
                            {{ $equipo->equ_descripcion }}
                        </td>-->
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            {{ $equipo->equ_ciclo }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $equipo->equ_created->format('Y-m-d') }}<br>
                            {{ $equipo->equ_created->format('H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <x-est_equipo :status="$equipo->equ_estado" />
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <button wire:click='verEquipo({{ $equipo->equ_id }})'
                                class="middle px-2 py-1 bg-cyan-500 border text-cyan-600 rounded-lg hover:bg-cyan-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <i class="fas fa-eye text-white"></i>
                            </button>
                            <button wire:click='editarEquipo({{ $equipo->equ_id }})'
                                    class="middle px-2 py-1 bg-lime-600 border border-lime-600 text-lime-600 rounded-lg hover:bg-lime-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-edit text-white"></i>
                            </button>
                            <button wire:click='eliminarEquipo({{ $equipo->equ_id }})'
                                    class="middle px-2 py-1 bg-red-600 border border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-trash text-white"></i>
                            </button>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</div>