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
            $table->unsignedBigInteger('carro_id')->unsigned()->nullable();
            
            $table->unsignedBigInteger('agenda_id')->unsigned()->nullable();

            
            $table->foreign('carro_id')->references('id')->on('carro')->onDelete('cascade');
            
            $table->foreign('agenda_id')->references('id')->on('agendamentos')->onDelete('cascade');
           
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
