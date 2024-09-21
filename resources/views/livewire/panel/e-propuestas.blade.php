<div class="bg-white shadow-lg rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-3">Propuestas</h3>
    <div class="space-y-2">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-righ">
                <tbody>
                    <tr class="border-b">
                        <td class="py-1 whitespace-nowrap">
                            Tipo
                        </td>
                        <td class="py-1 text-center">
                            Oficial
                        </td>
                        <td class="py-1 text-center">
                            No oficial
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1 whitespace-nowrap">
                            Tesis
                        </td>
                        <td class="py-1 text-center">
                            {{ $oficial['Tesis'] ?? '-' }}
                        </td>
                        <td class="py-1 text-center">
                            {{ $no_oficial['Tesis'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1 whitespace-nowrap">
                            Cursos
                        </td>
                        <td class="py-1 text-center">
                            {{ $oficial['Curso'] ?? '-' }}
                        </td>
                        <td class="py-1 text-center">
                            {{ $no_oficial['Curso'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1 whitespace-nowrap">
                            Proyectos
                        </td>
                        <td class="py-1 text-center">
                            {{ $oficial['Gestor UDH'] ?? '-' }}
                        </td>
                        <td class="py-1 text-center">
                            {{ $no_oficial['Gestor UDH'] ?? '-' }}
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-1 font-bold whitespace-nowrap">
                            Total
                        </td>
                        <td class="py-1 text-center font-bold">
                            {{ $totalOficial ?? '-' }}
                        </td>
                        <td class="py-1 text-center font-bold">
                            {{ $totalNooficial ?? '-' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
