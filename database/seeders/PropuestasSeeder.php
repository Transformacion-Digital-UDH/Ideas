<?php

namespace Database\Seeders;

use App\Models\Propuestas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Propuestas::factory(5)->create();
    }
}
