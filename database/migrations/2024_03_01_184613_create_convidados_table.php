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
        Schema::create('convidados', function (Blueprint $table) {
            $table->id();
            $table->boolean('notificado')->default(true);
            $table->boolean('vai_comparecer')->default(false);
            $table->foreignId('usuario_id');
            $table->foreignId('convidado_id');
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
        Schema::dropIfExists('convidados');
    }
};
