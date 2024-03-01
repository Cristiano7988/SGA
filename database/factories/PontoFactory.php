<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\{ Evento, Usuario };
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ponto>
 */
class PontoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $hora = rand(8, 17) - date('H');
        return [
            'hora' => date('H:00:00', strtotime("+{$hora} hour")),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'foto' => fake()->image(),
            'ip' => rand(0, 1) ? fake()->ipv4() : fake()->ipv6(),
            'usuario_id' => Usuario::all()->random()->id,
            'evento_id' => Evento::all()->random()->id,
        ];
    }
}
