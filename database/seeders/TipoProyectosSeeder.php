<?php

namespace Database\Seeders;

use App\Models\TipoProyectos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            'Proyectos de investigación básica',
            'Proyectos de investigación aplicada',
            'Proyectos de desarrollo tecnológico',
            'Proyectos de Validación y Demostración en Entornos Reales',
            'Proyectos de despliegue comercial inicial',
            'Proyectos de implementación de normativas de gestión de calidad',
            'Proyectos de inversión',
            'Proyectos Sociales',
        ];

        foreach ($tipos as $tipo) {
            $t_proyecto = new TipoProyectos();
            $t_proyecto->tpro_nombre = $tipo;
            $t_proyecto->save();
        }
    }
}
