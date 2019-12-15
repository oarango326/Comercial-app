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
            $table->string('facnum',15);
            $table->date('facfecha');
            $table->bigInteger('fabricante_id')->unsigned();
            $table->bigInteger('cliente_id')->unsigned();
            $table->date('facvence')->nullable();
            $table->float('total',10,2);
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
