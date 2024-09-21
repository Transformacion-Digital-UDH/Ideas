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
            'Proyecto de investigación básica',
            'Proyecto de investigación aplicada',
            'Proyecto de desarrollo tecnológico',
            'Proyecto de Validación y Demostración en Entornos Reales',
            'Proyecto de despliegue comercial inicial',
            'Proyecto de implementación de normativas de gestión de calidad',
            'Proyecto de inversión',
            'Proyecto Sociales',
        ];

        foreach ($tipos as $tipo) {
            $t_proyecto = new TipoProyectos();
            $t_proyecto->tpro_nombre = $tipo;
            $t_proyecto->save();
        }
    }
}
