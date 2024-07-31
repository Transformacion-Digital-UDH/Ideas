<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'VRI',
            'email' => 'vri@udh.edu.pe',
            'telefono' => '123456789',
        ])->assignRole('VRI');

        User::factory()->create([
            'name' => 'PAISI',
            'email' => 'paisi@udh.edu.pe',
            'telefono' => '123456789',
        ])->assignRole('ESCUELA');

        User::factory()->create([
            'name' => 'Sociedad',
            'email' => 'sociedad@udh.edu.pe',
            'telefono' => '123456789',
        ])->assignRole('SOCIEDAD');

        User::factory()->create([
            'name' => 'Docente',
            'email' => 'docente@udh.edu.pe',
            'telefono' => '123456789',
        ])->assignRole('DOCENTE');

        User::factory()->create([
            'name' => 'Estudiante',
            'email' => 'estudiante@udh.edu.pe',
            'telefono' => '123456789',
        ])->assignRole('ESTUDIANTE');

        // User::factory(10)->create();
    }
}
