<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cliente_id')->unsigned();
            $table->string('tipodocumento');
            $table->date('fechadocumento');
            $table->string('numdocumento',10)->nullable()->default(0);
            $table->date('fechacobro');
            $table->string('tipocobro');
            $table->float('monto',10,2);
            $table->float('abono',10,2);
            $table->float('total',10,2);
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cobros');
    }
}
