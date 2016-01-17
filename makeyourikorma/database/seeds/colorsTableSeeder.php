<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class colorsTableSeeder extends Seeder {

	public function run()
	{
		\DB::table('colors')->insert(array (
			'hex' => '#000000'
		));
		\DB::table('colors')->insert(array (
			'hex' => '#ffffff'
		));
	}

}

