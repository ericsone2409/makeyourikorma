<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $table="Images";
	protected $fillable=['route'];

	//relacion uno a muchos entre image y variantImage
	public function variantImages()
	{
		return $this->hasMany('App\VariantImage');
	}

}
