<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UniqueImagesTableSeeder extends Seeder {

	public function run()
	{
		$faker= Faker::create();

		for ($i=0; $i < 15; $i++) { 
			$tipo='0';
			if ($i<=10 && $i>=5) {
				$tipo='1';
			}elseif ($i<=15 && $i>=11) {
				$tipo='2';
			}
			\DB::table('uniqueImages')->insert(array (
				'route' => $faker->lexify('img/unique/???'),
				'type'  => $tipo
			));
		}


	}

}



