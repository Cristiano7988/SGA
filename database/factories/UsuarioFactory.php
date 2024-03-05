<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use \App\Models\{ Sexo };

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lastName = ' ' . fake()->lastName();
        return [
            'nome' => fake()->name(),
            'data_de_nascimento' => fake()->datetimeBetween('- 70 years', '-14 years')->format('Y-m-d'),
            'nome_do_pai' => fake()->firstNameMale() . $lastName,
            'nome_da_mae' => fake()->firstNameFemale() . $lastName,
            'rg' => fake()->rg(),
            'cpf' => fake()->cpf(),
            'pis' => rand(100,999) . '.' . rand(10000,99999) . '.' . rand(10,99) . '-' . rand(10,99),
            'telefone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'sexo_id' => Sexo::all()->random()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
