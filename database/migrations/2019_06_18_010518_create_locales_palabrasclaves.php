<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalesPalabrasclaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locales_palabrasclaves', function (Blueprint $table) {
            $table->integer('local_id');
            $table->integer('palabrasclaves_id');
            $table->timestamps();
            $table->softDeletes();

            //relaciones
            // $table->foreign('local_id')->references('id')->on('locales');
            // $table->foreign('palabrasclaves_id')->references('id')->on('palabras_claves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locales_palabrasclaves');
    }
}
