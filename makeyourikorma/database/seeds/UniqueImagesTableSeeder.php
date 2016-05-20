<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UniqueImagesTableSeeder extends Seeder {

	public function run()
	{

		$dir = dirname(dirname(dirname(__DIR__)));
		$dir = $dir . "\\makeyourikorma\\public\\img\\uniques\\";
		echo "Directorio de iamgenes unicas: $dir \n";



		$file_set = File::allFiles($dir);
		foreach ($file_set as $file)
		{
			$filename = (string) $file;
			$type = explode("\\", dirname($filename));
			$type = $type[count($type) - 1];
			$uri = str_replace("\\", '/', explode('img', $filename)[1]);
			$uri = 'img' . $uri;
			

			\DB::table('uniqueImages')->insert(array (
				'route' => $uri,
				'type'  => $type
			));
		}




	}

}



