<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'conteudo' => $this->faker->sentence(),
            'usuario_id' => \App\Models\Usuario::factory(),
            'artigo_id' => \App\Models\Artigo::factory(),
        ];
    }
}
