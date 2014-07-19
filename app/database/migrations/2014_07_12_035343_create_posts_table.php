<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table)
		{
			$table->increments('id');
      		$table->integer('user_id')->unsigned();
      		$table->boolean('is_link')->default(false);
      		$table->string('type')->default("default");
      		
      		$table->string('title');
      		$table->string('slug')->nullable();

      		$table->text('caption')->nullable();
      		
      		$table->string('url')->nullable();
      		
      		//preview
      		$table->string('p_title')->nullable();
      		$table->string('p_description')->nullable();
      		$table->string('p_images')->nullable();
      		
      		
      		$table->smallInteger('status')->unsigned()->default(0);

      		$table->integer('comment_total')->unsigned()->default(0);
			$table->integer('love_total')->unsigned()->default(0);
			$table->integer('fav_total')->unsigned()->default(0);
			$table->integer('click_total')->unsigned()->default(0);
			
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
		Schema::drop('posts');
	}

}
