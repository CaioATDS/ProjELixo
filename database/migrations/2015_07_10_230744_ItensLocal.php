<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItensLocal extends Migration
{

    public function up()
    {
        Schema::create('itenslocal', function (Blueprint $table) {
            $table->increments('itenslocal_id');
            $table->integer('itenslocal_quantidade');
            $table->integer('modelos_id');
            $table->integer('coordenada_id');
        });
    }

    public function down()
    {
        Schema::drop('itenslocal');
    }
}
