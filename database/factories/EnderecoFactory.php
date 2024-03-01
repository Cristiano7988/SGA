<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'logradouro' => fake()->streetName(),
            'numero' => fake()->buildingNumber(),
            'complemento' => fake()->buildingNumber(),
            'cep' => fake()->cep(),
            'bairro' => fake()->city(),
            'cidade' => fake()->city(),
            'estado' => fake()->state(),
            'pais' => fake()->country(),
        ];
    }
}
