<?php namespace App\Http\Controllers;

use Image;
use App\UniqueImage;
use App\Imagen;
use App\Color;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$unicas= UniqueImage::get();
		
		foreach ($unicas as $value) {

			$unica[$value['id']]['route'] = $value['route'];
			$unica[$value['id']]['id'] = $value['id'];
		}
		echo json_encode($unica);
		//logica para el arreglo de las imagenes con sus variantes
		$images= Imagen::lists('route');

		for ($i=0; $i < count($images) ; $i++) { 

			$variantes= Imagen::where('route' , '=' , $images[$i])->first()->VariantImage;

			$images[$i]=['ruta' => $images[$i] , 'variantes' => $variantes];
		}

		//echo json_encode($images);

		//logica para los colores
		$colors = Color::get();

		foreach ($colors as $color) {
			$colores[$color['id']]= $color['hex'];
		}

		//echo json_encode($colores);
		
		//////////////////////////////////////////


		//return view('welcome')->with('imagenes', $colores);
	}

}
