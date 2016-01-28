<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class colorsTableSeeder extends Seeder {

	public function run()
	{
		//1
		\DB::table('colors')->insert(array (
			'hex' => '#451d5c'
		));

		//2
		\DB::table('colors')->insert(array (
			'hex' => '#1a1651'
		));

		//3
		\DB::table('colors')->insert(array (
			'hex' => '#004622'
		));

		//4
		\DB::table('colors')->insert(array (
			'hex' => '#79101e'
		));

		//5
		\DB::table('colors')->insert(array (
			'hex' => '#06050b'
		));


		//6
		\DB::table('colors')->insert(array (
			'hex' => '#cd4599'
		));

		//7
		\DB::table('colors')->insert(array (
			'hex' => '#3c51a4'
		));

		//8
		\DB::table('colors')->insert(array (
			'hex' => '#0ba64b'
		));

		//9
		\DB::table('colors')->insert(array (
			'hex' => '#ef2229'
		));

		//10
		\DB::table('colors')->insert(array (
			'hex' => '#636466'
		));

		//11
		\DB::table('colors')->insert(array (
			'hex' => '#ed8ab9'
		));

		//12
		\DB::table('colors')->insert(array (
			'hex' => '#5fa2d9'
		));







		//13
		\DB::table('colors')->insert(array (
			'hex' => '#9fcb3a'
		));

		//14
		\DB::table('colors')->insert(array (
			'hex' => '#f05222'
		));

		//15
		\DB::table('colors')->insert(array (
			'hex' => '#c7c8ca'
		));

		//16
		\DB::table('colors')->insert(array (
			'hex' => '#fadeec'
		));

		//17
		\DB::table('colors')->insert(array (
			'hex' => '#bae7fc'
		));




		//18
		\DB::table('colors')->insert(array (
			'hex' => '#f5eb17'
		));

		//19
		\DB::table('colors')->insert(array (
			'hex' => '#fba51e'
		));

		//20
		\DB::table('colors')->insert(array (
			'hex' => '#ffffff'
		));



	}

}

