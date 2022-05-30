<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinhaAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linha_agendamentos', function (Blueprint $table) {
            $table->bigInteger('id_carro')->unsigned()->nullable();
            $table->foreign('id_carro')->references('id')->on('carro')->onDelete('cascade');
            $table->bigInteger('id_agenda')->unsigned()->nullable();
            $table->foreign('id_agenda')->references('id')->on('agendamentos')->onDelete('cascade');
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
        Schema::dropIfExists('linha_agendamentos');
    }
}
