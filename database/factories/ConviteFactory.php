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
        $id_usuario = Usuario::all()->random()->id;
        return [
            'visualizado' => rand(0, 1),
            'vai_comparecer' => rand(0, 1),
            'usuario_id' => $id_usuario,
            'convidado_id' => Usuario::all()->where('id', '!=', $id_usuario)->random()->id,
            'evento_id' => Evento::all()->random()->id,
        ];
    }
}
