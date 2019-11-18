<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecobros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cobro_id')->unsigned();
            $table->timestamps();
            $table->foreign('cobro_id')->references('id')->on('cobros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallecobros');
    }
}
