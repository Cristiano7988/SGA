<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\{ Usuario };

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'usuario_id' => Usuario::all()->random()->id,
            'logradouro' => fake()->streetName(),
            'numero' => fake()->buildingNumber(),
            'complemento' => fake()->buildingNumber(),
            'cep' => 90 . rand(100,999) . '-' . rand(100,999),
            'bairro' => fake()->city(),
            'cidade' => fake()->city(),
            'estado' => fake()->state(),
            'pais' => fake()->country(),
        ];
    }
}
