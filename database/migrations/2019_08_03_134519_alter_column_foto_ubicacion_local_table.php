<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnFotoUbicacionLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locales', function (Blueprint $table) {
            $table->string('foto_ubicacion')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locales', function (Blueprint $table) {
            $table->string('foto_ubicacion')->nullable()->change();
        });
    }
}
