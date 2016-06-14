<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Itens extends Migration
{

    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('item_quantidade');
            $table->integer('modelos_id');
            $table->integer('coordenada_id');
            $table->integer('item_status');
        });
    }

    public function down()
    {
        Schema::drop('itens');
    }
}
