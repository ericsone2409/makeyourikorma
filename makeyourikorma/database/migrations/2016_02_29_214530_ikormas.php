<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ikormas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ikormas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
		});

		DB::statement("ALTER TABLE ikormas ADD data LONGBLOB");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ikormas');
	}

}
