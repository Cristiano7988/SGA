<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\{ Usuario };

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

            $total_de_usuarios = env('TOTAL_DE_USUARIOS');
            echo "Criando {$total_de_usuarios} Usuários... \n";
            Usuario::factory($total_de_usuarios)->create();

            echo "Tudo pronto! \n";
        }
    }
}
