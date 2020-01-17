<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Cobros', function (Blueprint $table) {
            //
            $table->bigInteger('factura_id')->unsigned()->after('total')->nullable();
            $table->foreign('factura_id')->references('id')->on('facturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Cobros', function (Blueprint $table) {
            //
            $table->dropForeign(['factura_id']);
        });
        Schema::table('Cobros', function (Blueprint $table) {
            //
            $table->dropColumn(['factura_id']);

        });


    }
}
