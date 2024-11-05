<div class="bg-white shadow-lg rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-3 text-udh_3">Equipos</h3>
    <div class="space-y-2">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-righ">
                <tbody>
                    <tr>
                        <th scope="row" class="py-1 font-medium whitespace-nowrap">
                            Cursos
                        </th>
                        <td class="py-1 text-center">
                            {{ $num_equipos['Curso'] ?? '0' }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="py-1 font-medium whitespace-nowrap">
                            Semilleros
                        </th>
                        <td class="py-1 text-center">
                            {{ $num_equipos['Semillero'] ?? '0' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
