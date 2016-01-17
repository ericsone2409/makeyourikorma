<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ImageTableSeeder extends Seeder {

	public function run()
	{
		$faker= Faker::create();

		for ($i=0; $i < 15; $i++) { 
			\DB::table('images')->insert(array (
				'route' => $faker->lexify('img/images/???'),
			));
		}


	}

}



