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
        Schema::table('agendamentos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_motorista')->unsigned()->nullable();
    
            $table->foreign('id_motorista')->references('id')->on('table_motorista')->onDelete('cascade');

            $table->unsignedBigInteger('id_carro')->unsigned()->nullable();
    
            $table->foreign('id_carro')->references('id')->on('table_carro')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            
            $table->dropColumn('id_motorista')->unsigned()->nullable();

            $table->dropColumn('id_carro')->unsigned()->nullable();
        });
    }
};
