<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulos', function (Blueprint $table) {
            //

            $table->integer('articulo_id')->after('id')->nullable();
            $table->string('detalle')->after('nombre')->nullable()->default('');
            $table->boolean('activo')->unsigned()->default(true)->after('precio');
            $table->bigInteger('categoria_id')->unsigned()->default('1')->change();
            $table->bigInteger('fabricante_id')->unsigned()->default('1')->change();
            $table->foreign('fabricante_id')->references('id')->on('fabricantes');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulos', function (Blueprint $table) {
            //
            $table->dropColumn(['articulo_id']);
            $table->dropColumn(['activo']);
            $table->dropColumn(['detalle']);
            $table->dropForeign(['fabricante_id']);

        });
        Schema::table('articulos', function (Blueprint $table) {
            //
            $table->dropForeign(['categoria_id']);
        });
        Schema::table('articulos', function (Blueprint $table) {
            //
            $table->bigInteger('categoria_id')->change();
        });
    }
}
