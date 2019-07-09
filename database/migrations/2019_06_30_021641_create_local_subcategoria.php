<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalSubcategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_subcategoria', function (Blueprint $table) {
            $table->unsignedInteger('local_id');
            $table->unsignedInteger('subcategoria_id');
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
        Schema::dropIfExists('local_subcategoria');
    }
}
