<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\{ Evento, Usuario };
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Convite>
 */
class ConviteFactory extends Factory
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
            'evento_id' => Evento::all()->random()->id
        ];
    }
}
