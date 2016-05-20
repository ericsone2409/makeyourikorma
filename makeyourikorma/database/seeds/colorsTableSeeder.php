<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class colorsTableSeeder extends Seeder {

	public function run()
	{
		//1
		\DB::table('colors')->insert(array (
			'hex' => '#660066'
		));

		//2
		\DB::table('colors')->insert(array (
			'hex' => '#cb3398'
		));

		//3
		\DB::table('colors')->insert(array (
			'hex' => '#ff99cb'
		));

		//4
		\DB::table('colors')->insert(array (
			'hex' => '#fadeec'
		));

		//5
		\DB::table('colors')->insert(array (
			'hex' => '#330065'
		));


		//6
		\DB::table('colors')->insert(array (
			'hex' => '#3c51a4'
		));

		//7
		\DB::table('colors')->insert(array (
			'hex' => '#669acc'
		));

		//8
		\DB::table('colors')->insert(array (
			'hex' => '#cdffff'
		));

		//9
		\DB::table('colors')->insert(array (
			'hex' => '#013300'
		));

		//10
		\DB::table('colors')->insert(array (
			'hex' => '#019934'
		));

		//11
		\DB::table('colors')->insert(array (
			'hex' => '#99cc01'
		));

		//12
		\DB::table('colors')->insert(array (
			'hex' => '#ffff01'
		));







		//13
		\DB::table('colors')->insert(array (
			'hex' => '#670001'
		));

		//14
		\DB::table('colors')->insert(array (
			'hex' => '#cc0001'
		));

		//15
		\DB::table('colors')->insert(array (
			'hex' => '#ff3300'
		));

		//16
		\DB::table('colors')->insert(array (
			'hex' => '#ff9934'
		));

		//17
		\DB::table('colors')->insert(array (
			'hex' => '#000000'
		));




		//18
		\DB::table('colors')->insert(array (
			'hex' => '#666666'
		));

		//19
		\DB::table('colors')->insert(array (
			'hex' => '#cccccc'
		));

		//20
		\DB::table('colors')->insert(array (
			'hex' => '#ffffff'
		));



	}

}

