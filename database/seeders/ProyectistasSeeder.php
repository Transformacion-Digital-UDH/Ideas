<?php

namespace Database\Seeders;

use App\Models\Proyectistas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectistasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proyectistas::factory(5)->create();
    }
}
