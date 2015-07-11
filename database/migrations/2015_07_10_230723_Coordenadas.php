<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coordenadas extends Migration
{

    public function up()
    {
        Schema::create('coordenadas', function (Blueprint $table) {
            $table->increments('coordenada_id');
            $table->decimal('coordenada_latitude', 18, 4);
            $table->decimal('coordenada_longitude', 18, 4);
            $table->integer('user_id');
            $table->timestamp('coordenada_data');
        });
    }

    public function down()
    {
        Schema::drop('coordenadas');
    }
}
