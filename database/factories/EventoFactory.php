<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\{ Endereco, Usuario };
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eventos>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $horarioInicial = rand(8, 17) - date('H');
        $horarioFinal = $horario + 1;

        return [
            'horario_inicial' => date('H:00:00', strtotime("+{$horarioInicial} hour")),
            'horario_final' => date('H:00:00', strtotime("+{$horarioFinal} hour")),
            'endereco_id' => Endereco::all()->random()->id,
            'usuario_id' => Usuario::all()->random()->id,
        ];
    }
}
