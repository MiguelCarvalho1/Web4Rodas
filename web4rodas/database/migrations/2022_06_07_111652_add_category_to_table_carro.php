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
        Schema::table('table_carro', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_id')->unsigned()->nullable();
    
            $table->foreign('tipo_id')->references('id')->on('tipo_veiculo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_carro', function (Blueprint $table) {
            $table->dropColumn('tipo_id')->unsigned()->nullable();
        });
    }
};
