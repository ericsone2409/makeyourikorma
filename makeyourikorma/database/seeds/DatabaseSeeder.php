<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UniqueImagesTableSeeder');

		$this->call('ImageTableSeeder');

		$this->call('VariantImagesTableSeeder');

		$this->call('colorsTableSeeder');
	}

}


