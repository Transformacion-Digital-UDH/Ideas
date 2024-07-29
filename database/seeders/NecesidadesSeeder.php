<?php

namespace Database\Seeders;

use App\Models\Necesidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NecesidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Necesidades::factory(15)->create();
    }
}
