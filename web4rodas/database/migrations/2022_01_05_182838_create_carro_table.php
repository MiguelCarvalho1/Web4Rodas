<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carro', function (Blueprint $table) {
            $table->id();
            $table->string('matricula',6);
            $table->string('Marca');
            $table->string('modelo');
            $table->integer('lotacao');
            $table->timestamps();

            $table->integer('id_motorista')->unsigned()->nullable();

            $table->foreign('id_motorista')->references('id')->on('motorista')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxis');
    }
}
