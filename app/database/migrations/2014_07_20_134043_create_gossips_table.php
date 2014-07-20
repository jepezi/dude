<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGossipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gossips', function($table)
		{
			$table->increments('id');
      		$table->integer('user_id')->unsigned();
      		
      		$table->string('from')->nullable();
      		$table->text('url');
      		$table->text('caption');
			
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
		Schema::drop('gossips');
	}

}
