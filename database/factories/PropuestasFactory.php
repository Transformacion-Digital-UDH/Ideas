<?php

namespace Database\Factories;

use App\Models\Propuestas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propuestas>
 */
class PropuestasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pro_titulo' => $this->faker->sentence,
            'pro_descripcion' => $this->faker->paragraph,
            'pro_lugar' => $this->faker->city,
            'pro_beneficiarios' => $this->faker->paragraph,
            'pro_tratar' => $this->faker->paragraph,
            'pro_causas' => $this->faker->paragraph,
            'pro_consecuencias' => $this->faker->paragraph,
            'pro_aportes' => $this->faker->sentence,
            'problematicas' => $this->faker->paragraph,
            'pro_justificacion' => $this->faker->paragraph,
            'variable_1' => $this->faker->word,
            'variable_2' => $this->faker->word,
            'pro_tipo' => $this->faker->randomElement(['Curso', 'Tesis', 'Proyecto']),
            'pro_proceso' => $this->faker->randomElement(Propuestas::estados()),
            'nec_id' => \App\Models\Necesidades::factory(),
            'tpro_id' => \App\Models\TipoProyectos::factory(),
            'curador_id' => \App\Models\User::factory(),
            'pro_estado' => 1,
            'pro_created' => now(),
            'pro_updated' => now(),
        ];
    }
}
