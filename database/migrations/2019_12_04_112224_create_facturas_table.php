<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('factnum');
            $table->date('factfecha');
            $table->bigInteger('fabricante_id')->unsigned();
            $table->bigInteger('cliente_id')->unsigned();
            $table->date('factvence');
            $table->float('factmonto');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('fabricante_id')->references('id')->on('fabricantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            //
            $table->dropForeign(['cliente_id']);
            $table->dropForeign(['fabricante_id']);
        });


        Schema::dropIfExists('facturas');
    }
}
