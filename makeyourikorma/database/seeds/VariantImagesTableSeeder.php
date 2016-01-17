<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class VariantImagesTableSeeder extends Seeder {

	public function run()
	{
		$faker= Faker::create();

		for ($i=1; $i <= 15; $i++) { 
			\DB::table('variantImages')->insert(array (
				'route' => $faker->lexify('img/images/???'),
				'id_color' => 0,
				'image_id' => $i
			));
			\DB::table('variantImages')->insert(array (
				'route' => $faker->lexify('img/images/???'),
				'id_color' => 1,
				'image_id' => $i
			));
		}


	}

}



