<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function(Blueprint $table)
        {
            $table->string('username')->nullable();
            $table->string('email')->unique()->default(time() . '-no-reply@EasyAuthenticator.com')->change();
            $table->string('avatar');
            $table->string('provider')->default('laravel');
            $table->string('provider_id')->unique();
            $table->string('activation_code');
            $table->integer('active');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
