<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasubcategoriaLocal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoriasubcategoria_local', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categoriasubcategoria_id')->usigned();
            $table->integer('local_id')->usigned();
            $table->softDeletes();

            //relaciones
            // $table->foreign('categoriasubcategoria_id')->references('id')->on('categorias_subcategorias');
            // $table->foreign('local_id')->references('id')->on('locales');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoriasubcategoria_local');
    }
}
