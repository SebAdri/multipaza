<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateLocalSubcate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_local_subcate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('local_id');
            $table->integer('categoria_id')->nullable();
            $table->integer('subcategoria_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cate_local_subcate');
    }
}
