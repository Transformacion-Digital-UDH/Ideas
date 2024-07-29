<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipos>
 */
class EquiposFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'equ_codigo' => $this->faker->regexify('[A-Z0-9]{20}'),
            'equ_nombre' => $this->faker->words(3, true),
            'equ_descripcion' => $this->faker->optional()->sentence,
            'equ_tipo' => $this->faker->randomElement(['Curso', 'Semillero']),
            'equ_estado' => 1,
            'equ_created' => now(),
            'equ_updated' => now(),
        ];
    }
}
