<?php namespace App\Http\Controllers;

use Image;
use App\UniqueImage;
use App\Imagen;
use App\Color;
class MyiController extends Controller {

	
	public function index()
	{
		return view('myi'); //aqui hay que poner la vista del MYI
	}

}
