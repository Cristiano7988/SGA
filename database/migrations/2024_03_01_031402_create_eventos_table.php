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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->time('horario_inicial');
            $table->time('horario_final');
            $table->foreignId('dia_id')->nullable();
            $table->foreignId('endereco_id')->nullable();
            $table->foreignId('tipo_de_evento_id')->nullable();
            $table->foreignId('empresa_id')->nullable();
            $table->foreignId('usuario_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
