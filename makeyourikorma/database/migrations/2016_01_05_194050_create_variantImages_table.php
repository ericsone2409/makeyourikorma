<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('variantImages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('route');
			$table->integer('id_color')->unsigned();
			$table->integer('image_id')->unsigned();
			$table->timestamps();

			//foreing keys
			$table->foreign('image_id')->references('id')->on('images');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('variantImages');
	}

}
