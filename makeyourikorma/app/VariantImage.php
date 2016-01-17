<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class VariantImage extends Model {

	protected $table="variantImages";
	protected $fillable=['route', 'color', 'image_id'];

	//relacion uno a muchos inversa entre image y variantImage
	public function Imagen()
	{
		return $this->belongsto('App\Imagen');
	}
}
