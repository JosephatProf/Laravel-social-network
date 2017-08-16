<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('advert_owner');
            $table->string('advert_name');
            $table->boolean('paid');
            $table->string('valid_key');
            $table->string('advert_media');
            $table->string('advert_website');
            $table->integer('period');
            $table->bigInteger('amount_paid');
            $table->integer('user_id');
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
		Schema::drop('adverts');
	}

}
