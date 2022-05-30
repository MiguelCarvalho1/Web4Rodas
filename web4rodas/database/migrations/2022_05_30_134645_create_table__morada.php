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
        Schema::create('table__morada', function (Blueprint $table) {
            $table->id();
            $table->string('rua');
            $table->integer('n_porta');
            $table->string('andar');
            

            $table->unsignedBigInteger('codigoPostal_id')->unsigned()->nullable();
            $table->foreign('codigoPostal_id')->references('id')->on('table_codi_postal')->onDelete('cascade');

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
        Schema::dropIfExists('table__morada');
    }
};
