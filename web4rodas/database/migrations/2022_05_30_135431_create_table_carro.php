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
        Schema::create('table_carro', function (Blueprint $table) {
          $table->id();
            $table->string('matricula',6);
            $table->string('Marca');
            $table->string('modelo');
            $table->integer('lotacao');
            $table->timestamps();

            $table->unsignedBigInteger('motorista_id')->unsigned()->nullable();

            $table->foreign('motorista_id')->references('id')->on('table_motorista')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_carro');
    }
};
