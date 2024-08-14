<?php

namespace Database\Seeders;

use App\Models\EstadoProceso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            [
                'est_id' => 1,
                'est_codigo' => 'ASIG',
                'est_nombre' => 'Asignado',
                'est_descripcion' => 'Se ha identificado y asignado formalmente a una persona o equipo para que comience a trabajar en la solución.',
                'est_rol' => 'Todos',
                'est_siguiente' => 'PLAN',
            ],
            [
                'est_id' => 2,
                'est_codigo' => 'PLAN',
                'est_nombre' => 'En Planificación',
                'est_descripcion' => 'Se desarolla un plan detallado para abordar la necesidad. Incluye la definición de los objetivos, el alcance, los recursos, el cronograma y los riesgos asociados.',
                'est_rol' => 'Todos',
                'est_siguiente' => 'EJEC',
            ],
            [
                'est_id' => 3,
                'est_codigo' => 'EJEC',
                'est_nombre' => 'En Ejecución',
                'est_descripcion' => 'Se implementan las estrategias y planes desarrollados para resolver la necesidad. El equipo debe trabajar activamente en las acciones necesarias para alcanzar los objetivos establecidos.',
                'est_rol' => 'Todos',
                'est_siguiente' => 'FINA',
            ],
            [
                'est_id' => 4,
                'est_codigo' => 'FINA',
                'est_nombre' => 'En Finalización ',
                'est_descripcion' => 'Se lleva a cabo la revisión final del trabajo, la entrega de resultados, la documentación, correcciones y acuerdos.',
                'est_rol' => 'Todos',
                'est_siguiente' => 'COMP',
            ],
            [
                'est_id' => 5,
                'est_codigo' => 'COMP',
                'est_nombre' => 'Completado ',
                'est_descripcion' => 'La propuesta ha sido resuelto completamente, el proceso se da por terminado oficialmente, y se cierra el proyecto de manera formal.',
                'est_rol' => 'Todos',
                'est_siguiente' => '',
            ],
        ];

        foreach ($estados as $estado) {
            $objeto = new EstadoProceso();
            $objeto->est_id = $estado['est_id'];
            $objeto->est_codigo = $estado['est_codigo'];
            $objeto->est_nombre = $estado['est_nombre'];
            $objeto->est_descripcion = $estado['est_descripcion'];
            $objeto->est_rol = $estado['est_rol'];
            if (isset($estado['est_siguiente'])) {
                $objeto->est_siguiente = $estado['est_siguiente'];
            }
            $objeto->save();
        }
    }
}
