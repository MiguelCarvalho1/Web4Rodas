<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxistas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('nif');
            $table->string('telemovel',9);
            $table->string('email');
            $table->string('cartaCondu');
            $table->foreign('id_morada')->references('id')->on('morada')->onDelete('cascade');
            $table->timestamps();

            
            $table->integer('id_morada')->unsigned()->nullable();

            $table->foreign('id_morada')->references('id')->on('morada')->onDelete('cascade');

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxistas');
    }
}
