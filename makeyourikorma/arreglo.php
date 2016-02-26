<?php
//logica para las imagenes que no tiene variantes
		$unicas= UniqueImage::get();
		
		foreach ($unicas as $value) {

			$unica[$value['type']][] = $value['route'];
		}

		//logica para el arreglo de las imagenes con sus variantes
		$images= Imagen::lists('route');

		for ($i=0; $i < count($images) ; $i++) { 

			$variantes= Imagen::where('route' , '=' , $images[$i])->first()->VariantImage;

			$images[$i]=['ruta' => $images[$i] , 'variantes' => $variantes];
		}

		//logica para los colores
		$colors= Color::get();

		foreach ($colors as $color) {
			$colores[$color['id']]= $color['hex'];
		}
		
		//////////////////////////////////////////

		$colores= json_encode($colores);
		return view('welcome')->with('imagenes', $colores);
?>