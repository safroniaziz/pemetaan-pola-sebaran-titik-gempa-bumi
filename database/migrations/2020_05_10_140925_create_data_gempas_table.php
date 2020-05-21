<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataGempasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_gempas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->double('kedalaman')->nullable();
            $table->double('kekuatan')->nullable();
            $table->double('kedalaman_error')->nullable();
            $table->double('kekuatan_error')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_gempas');
    }
}
