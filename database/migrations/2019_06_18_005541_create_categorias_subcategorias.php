<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasSubcategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_subcategorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categoria_id')->usigned();
            $table->integer('subcategoria_id')->usigned();
            $table->softDeletes();

            //relaciones
            // $table->foreign('categoria_id')->references('id')->on('categorias');
            // $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_subcategorias');
    }
}
