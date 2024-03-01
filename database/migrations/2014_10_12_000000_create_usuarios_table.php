<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_de_nascimento')->nullable();
            $table->string('foto')->nullable();
            $table->string('nome_da_mae')->nullable();
            $table->string('nome_do_pai')->nullable();
            $table->string('telefone')->nullable();
            // Documentos
            $table->string('rg')->unique();
            $table->string('cpf')->unique();
            $table->string('pis')->unique();
            // Acessos
            $table->string('email')->unique();
            $table->string('password');
            $table->string('online')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            // Chaves estrangeiras
            $table
                ->foreignId('sexo_id')
                ->default(1); // Não informado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
