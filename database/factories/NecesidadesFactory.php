<?php

namespace Database\Factories;

use App\Models\Necesidades;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Necesidades>
 */
class NecesidadesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'nec_tipo' => $this->faker->randomElement(Necesidades::tipos_entidad()),
            'nec_entidad' => $this->faker->company,
            'nec_documento' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'nec_titulo' => $this->faker->sentence,
            'nec_descripcion' => $this->faker->paragraph,
            'nec_email' => $this->faker->email,
            'nec_telefono' => $this->faker->phoneNumber,
            'nec_direccion' => $this->faker->address,
            'es_financiado' => $this->faker->randomElement(['SI', 'NO']),
            'nec_proceso' => $this->faker->randomElement(Necesidades::estados()),
            'user_id' => \App\Models\User::factory(),
            'responsable_id' => $this->faker->boolean ? \App\Models\User::factory() : null,
            'nec_estado' => 1,
            'nec_created' => now(),
            'nec_updated' => now(),
        ];
    }
}
