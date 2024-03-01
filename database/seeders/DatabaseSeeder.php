<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\{ Convite, Dia, Endereco, Evento, Ponto, Usuario };

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'local') {
            $mensagemDeErro = validaVariaveisComDadosFakes();

            if ($mensagemDeErro) {
                echo $mensagemDeErro;
                return;
            }

            $this->call([
                SexoSeeder::class
            ]);

            $total_de_usuarios = env('TOTAL_DE_USUARIOS');
            echo "Criando {$total_de_usuarios} Usuários... \n";
            Usuario::factory($total_de_usuarios)->create();

            $total_de_enderecos = env('TOTAL_DE_ENDERECOS');
            echo "Criando {$total_de_enderecos} Endereços... \n";
            Endereco::factory($total_de_enderecos)->create();

            $total_de_dias = env('TOTAL_DE_DIAS');
            echo "Criando {$total_de_dias} Dias... \n";
            Dia::factory($total_de_dias)
                ->sequence(fn ($dia) => [
                    'data' => date('Y-m-d', strtotime("+{$dia->index} days"))
                ])
                ->create();

            $total_de_eventos = env('TOTAL_DE_EVENTOS');
            echo "Criando {$total_de_eventos} Eventos... \n";
            Evento::factory($total_de_eventos)->create();

            $total_de_pontos = env('TOTAL_DE_PONTOS');
            echo "Criando {$total_de_pontos} Pontos... \n";
            Ponto::factory($total_de_pontos)->create();

            $total_de_convites = env('TOTAL_DE_CONVITES');
            echo "Criando {$total_de_convites} Convites... \n";
            Convite::factory($total_de_convites)->create();
            

            echo "Tudo pronto! \n";
        }
    }
}
