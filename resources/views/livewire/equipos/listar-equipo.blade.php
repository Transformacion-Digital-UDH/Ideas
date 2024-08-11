<div>
    <div class="relative overflow-x-auto">
        <table
            class="table_id w-full text-sm text-left rtl:text-right bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Nombre/Tipo</th>
                    <th scope="col" class="px-6 py-3">Registro</th>
                    <th scope="col" class="px-6 py-3 text-center">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $equipo->equ_codigo }}
                        </td>
                        <td class="px-6 py-4">
                            <strong class="text-gray-900">{{ $equipo->equ_nombre }}</strong>
                            <br>{{ $equipo->equ_tipo }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $equipo->equ_created->format('Y-m-d') }}<br>
                            {{ $equipo->equ_created->format('H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <x-estadoItem :status="$equipo->equ_estado" />
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
                            <button wire:click='confirmDelete({{ $equipo->equ_id }})'
                                class="middle px-2 py-1 bg-red-600 border border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <i class="fas fa-trash text-white"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal de confirmación -->
    <div wire:ignore.self class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75" style="display: none;" id="delete-modal">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Confirmar Eliminación</h2>
            <p>¿Estás seguro de eliminar este equipo?</p>
            <div class="mt-4 flex justify-end">
                <button onclick="document.getElementById('delete-modal').style.display='none'" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 hover:text-gray-900 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 shadow-lg">Cancelar</button>
                <button wire:click="eliminarEquipo" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 hover:text-gray-200 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 shadow-lg">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('show-delete-modal', event => {
        document.getElementById('delete-modal').style.display = 'flex';
    });

    window.addEventListener('hide-delete-modal', event => {
        document.getElementById('delete-modal').style.display = 'none';
    });
</script>
