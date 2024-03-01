<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\{ Endereco, Usuario };

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

            echo "Tudo pronto! \n";
        }
    }
}
