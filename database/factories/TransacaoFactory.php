<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\{ Evento, Usuario };
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transacao>
 */
class TransacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $eventos = 0;
        while (!$eventos) {
            $usuario = Usuario::all()->random();
            $eventos = $usuario->pontos->pluck('evento_id')->count();
        }

        $dias = rand(0, 7);
        $data = rand(0, 1) ? "+{$dias} days" : "-{$dias} days";
        
        return [
            'data_do_pagamento' => date('Y-m-d H:m:i', strtotime($data)),
            'valor_pago' => rand(0, 100),
            'usuario_id' => $usuario->id,
            'evento_id' => $usuario->pontos->random()->evento_id,
            'forma_de_pagamento_id' => 1
        ];
    }
}
