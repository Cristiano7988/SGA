<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\{ Usuario };
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Convidado>
 */
class ConvidadoFactory extends Factory
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
            'notificado' => rand(0, 1),
            'vai_comparecer' => rand(0, 1),
            'usuario_id' => $id_usuario,
            'convidado_id' => Usuario::all()->where('id', '!=', $id_usuario)->random()->id,
        ];
    }
}
