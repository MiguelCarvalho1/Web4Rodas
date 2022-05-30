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
        Schema::create('table_motorista', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('nif');
            $table->string('telemovel',9);
            $table->string('email');
            $table->string('cartaCondu');
            $table->timestamps();

            
            $table->unsignedBigInteger('morada_id')->unsigned()->nullable();
            $table->foreign('morada_id')->references('id')->on('table__morada')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_motorista');
    }
};
