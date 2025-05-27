<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artigo>
 */
class ArtigoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'conteudo' => $this->faker->paragraph(),
            'usuario_id' => \App\Models\Usuario::factory(),
            'curtidas' => $this->faker->numberBetween(0, 1000),
            'comentarios' => $this->faker->numberBetween(0, 100),
            'salvamentos' => $this->faker->numberBetween(0, 100),
        ];
    }
}
