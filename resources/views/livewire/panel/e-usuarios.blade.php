<div class="bg-white shadow-lg rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-3 text-udh_3">Usuarios</h3>
    <div class="space-y-2">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-righ">
                <tbody>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            Sociedad
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_users['SOCIEDAD'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            Estudiantes
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_users['ESTUDIANTE'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            Docentes
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_users['DOCENTE'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            Proyectistas
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_users['DOCENTE'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" class="py-1 whitespace-nowrap">
                            Curadores
                        </td>
                        <td class="py-1 text-center">
                            {{ $num_users['VRI'] + $num_users['ESCUELA'] }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
