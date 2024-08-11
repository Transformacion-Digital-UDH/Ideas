<div>
    <div class="grid grid-cols-1 gap-6">
        @foreach ($necesidades as $necesidad)
            <div class="bg-white shadow-sm rounded-lg p-6 flex justify-between items-center card-item">
                <div class="w-full">
                    <div class="flex justify-between items-center">
                        <div></div>
                        <p class="text-gray-400 text-sm font-bold">Registrado el {{ $necesidad->nec_created->format('d/m/Y') ?? '' }}</p>
                    </div>
                    
                    <h3 class="text-lg font-medium mb-2 text-blue-950">{{ $necesidad->nec_titulo }}</h3>
                    <p class="text-gray-500 mb-4 line-clamp-3 text-sm">{{ $necesidad->nec_entidad }}</p>
                    <div class="flex justify-between items-end mt-2">
                        <div class="text-gray-400 text-sm font-bold block md:flex">
                            <x-com_proceso :status="$necesidad->nec_proceso" />
                        </div>
                        <div>
                            <button wire:click="verNecesidad({{ $necesidad->nec_id }})"
                                class="middle px-2 py-1 bg-cyan-500 border text-cyan-600 rounded-lg hover:bg-cyan-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <i class="fas fa-eye text-white"></i>
                            </button>
                            @if ($necesidad->nec_proceso == 'Pendiente')
                                <button wire:click="editarNecesidad({{ $necesidad->nec_id }})"
                                    class="middle px-2 py-1 bg-lime-600 border border-lime-600 text-lime-600 rounded-lg hover:bg-lime-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-edit text-white"></i>
                                </button>
                                <button wire:click="confirmDelete({{ $necesidad->nec_id }})"
                                    class="middle px-2 py-1 bg-red-600 border border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <i class="fas fa-trash text-white"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        <!-- Modal de confirmación -->
    <div wire:ignore.self class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75" style="display: none;" id="delete-modal">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-center font-bold mb-4">Confirmar Eliminación</h2>
            <p>¿Estás seguro de eliminar esta necesidad?</p>
            <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-center">
                <button onclick="document.getElementById('delete-modal').style.display='none'" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-300 text-gray-700 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150  shadow-lg">Cancelar</button>
                <button wire:click="eliminarNecesidad" class="inline-flex items-center px-4 py-2 bg-red-600 text-white border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150   shadow-lg">Eliminar</button>
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
