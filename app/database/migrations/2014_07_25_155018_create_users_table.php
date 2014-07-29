<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
	    {
	      $table->increments('id');
	      $table->string('username')->nullable();
	      $table->string('email');
	      $table->string('first_name')->nullable();
	      $table->string('last_name')->nullable();
	      $table->string('password')->nullable();
	      $table->string('uid')->nullable();
	      $table->string('oauth_token')->nullable();
	      $table->string('oauth_token_secret')->nullable();
	      $table->string('remember_token')->nullable();
	      $table->boolean('isAdmin')->default(false);
	      $table->string('avatar')->nullable();
			$table->string('location')->nullable();
			$table->string('gender')->nullable();
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
		Schema::drop('users');
	}

}
