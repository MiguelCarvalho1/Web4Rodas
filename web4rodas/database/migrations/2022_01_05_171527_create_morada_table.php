<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morada', function (Blueprint $table) {
            $table->id();
            $table->string('rua');
            $table->integer('n_porta');
            $table->integer('andar');
            $table->timestamps();

            $table->integer('id_codigoPostal')->unsigned();

            $table->foreign('id_codigoPostal')->references('id')->on('codigoPostal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('morada');
    }
}
