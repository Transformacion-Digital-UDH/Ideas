<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
            EstadoProcesoSeeder::class,
            // NecesidadesSeeder::class,
            // ProyectistasSeeder::class,
            TipoProyectosSeeder::class,
            // PropuestasSeeder::class,
            EquiposSeeder::class,
        ]);
    }
}
