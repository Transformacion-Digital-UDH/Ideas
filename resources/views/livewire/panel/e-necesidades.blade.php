<div class="bg-white shadow-lg rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-3">Ideas</h3>
    <div class="space-y-2">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-righ">
                <tbody>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            En espera
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_necesidades['En Espera'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            Por asignar
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_necesidades['Postulado'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            En ejecución
                        </td>
                        <td class="py-1 text-center">
                            {{ $en_ejecucion ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            Culminado
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_necesidades['Completado'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            No Aplica
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_necesidades['No Aplica'] ?? '-' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
