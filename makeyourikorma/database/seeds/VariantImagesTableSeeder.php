<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class VariantImagesTableSeeder extends Seeder {

	public function run()
	{


		$dir = dirname(dirname(dirname(__DIR__)));
		$dir = $dir . "\\public_html\\img\\variants\\";
		echo "Directorio de iamgenes con variantes: $dir \n";


		$file_set = File::allFiles($dir);

		foreach ($file_set as $file)
		{


			$filename = (string) $file;

			$uri = str_replace("\\", '/', explode('img', $filename)[1]);
			$uri = 'img' . $uri;

			$id_color = explode("\\", $filename);
			$id_color = $id_color[count($id_color) - 1];
			$id_color = explode('.', $id_color);

			$id = $id_color[0];
			$id_color = $id_color[1];

			\DB::table('variantImages')->insert(array (
				'route' => $uri,
				'id_color' => $id_color,
				'image_id' => $id
			));


			
		}


	}

	public function down()
	{
	    Schema::dropIfExists('variantImages');
	    Schema::drop('images');
	}

}



