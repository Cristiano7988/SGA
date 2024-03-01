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
        Schema::create('pontos', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('foto')->nullable();
            $table->string('ip')->nullable();
            $table->string('nsr')->nullable();
            $table->foreignId('usuario_id');
            $table->foreignId('evento_id');
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
        Schema::dropIfExists('pontos');
    }
};
