<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ImageTableSeeder extends Seeder {

	public function run()
	{
		$dir = dirname(dirname(dirname(__DIR__)));
		$dir = $dir . "\\makeyourikorma\\public\\img\\variants\\";
		echo "Directorio de iamgenes con variantes: $dir \n";

		$image_set = array();

		$file_set = File::allFiles($dir);

		foreach ($file_set as $file)
		{


			$filename = (string) $file;

			$uri = str_replace("\\", '/', explode('img', $filename)[1]);
			$uri = 'img' . $uri;

			$id = explode("\\", $filename);
			$id = $id[count($id) - 1];
			$id = explode('.', $id)[0];

			if ( !in_array($id, $image_set) )
			{
				$image_set[] = $id;
				\DB::table('images')->insert(array (
					'id'    => $id,
					'route' => $uri
				));

			}


			
		}


	}

}



