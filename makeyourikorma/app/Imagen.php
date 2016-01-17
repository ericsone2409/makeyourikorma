<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model {

	protected $table="Images";
	protected $fillable=['id' , 'route'];

	//relacion uno a muchos entre image y variantImage
	public function VariantImage()
	{
		return $this->hasMany('App\VariantImage', 'image_id');
	}

}
