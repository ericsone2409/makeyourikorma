<?php

namespace App\Http\Controllers;


use Image;
use App\UniqueImage;
use App\Imagen;
use App\Color;


use App\Ikorma;

use Illuminate\Http\Request;



class MyiController extends Controller {

	
	private function getJSON()
	{
		$returnVar = array();

		$unicas= UniqueImage::get();
		
		foreach ($unicas as $value) {

			$unica[$value['id']]['route'] = $value['route'];
			$unica[$value['id']]['id'] = $value['id'];
		}
		$returnVar['unicas'] =  json_encode($unica);
		//logica para el arreglo de las imagenes con sus variantes
		$images= Imagen::lists('route');

		for ($i=0; $i < count($images) ; $i++) { 

			$variantes= Imagen::where('route' , '=' , $images[$i])->first()->VariantImage;

			$images[$i]=['ruta' => $images[$i] , 'variantes' => $variantes];
		}

		$returnVar['variantes'] =  json_encode($images);

		//logica para los colores
		$colors = Color::get();

		foreach ($colors as $color) {
			$colores[$color['id']]= $color['hex'];
		}

		$returnVar['colores'] = json_encode($colores);


		return $returnVar;
	}


	public function index()
	{
		return view('myi', $this->getJSON());
	}

	public function share($id)
	{
		return view('share', ['id' => $id]);
	}

	public function saveImage(Request $request)
	{
		$imgData = $request->data;

		$imgData = str_replace(' ','+', $imgData);
		$imgData = substr($imgData,strpos($imgData,",")+1);
		$imgData = base64_decode($imgData);

		$dir = dirname(dirname(dirname(dirname(__DIR__))));

		$marco = $dir . "\\public_html\\myi-app\\marco-negro-grande.png";
		
		$img = Image::canvas(490, 490, "#fff")
			->insert($imgData, 'top-left', 20, 20)
			->insert($marco, '0', '0');

		$new = Ikorma::create(array(
			'data' => $img->encode('jpg')
		));


		return response()->json(array(
			'id'      => $new->id,
			'success' => 1
		));

	}


	public function seeImage($id)
	{
		$saved = Ikorma::find( $id );


        $response = response()->make( $saved->data, 200 );


        $response->header('Content-Type', 'image/jpeg');

        return $response;
	}

	public function downloadImage($id)
	{
		$saved = Ikorma::find( $id );


        $response = response()->make( $saved->data, 200 );


        $response->header('Content-Type', 'image/jpeg');
        $response->header("Cache-Control", "private");
        $response->header("Content-Type", "application/stream");
        //$response->header("Content-Length: ". $fileSize );
        $response->header("Content-Disposition", "attachment; filename=my-ikorma.jpg");

        return $response;
	}

}
