<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('likeable',function(Blueprint $table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('likeable_id');
			$table->string('likeable_type');
			$table->timestamps();
		});
	}
	//likeable_id will be status of the like
	//and likeable_type classifys which type of data user liked

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('likeable');
	}

}
