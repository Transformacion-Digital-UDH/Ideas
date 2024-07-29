<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyectistas>
 */
class ProyectistasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'proy_nombres' => $this->faker->name,
            'proy_telefono' => $this->faker->phoneNumber,
            'proy_email' => $this->faker->email,
            'proy_profesion' => $this->faker->jobTitle,
            'proy_descripcion' => $this->faker->paragraph,
            'proy_estado' => 1,
            'proy_created' => now(),
            'proy_updated' => now(),
        ];
    }
}
