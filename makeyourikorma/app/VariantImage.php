<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class variantImage extends Model {

	protected $table="variantImages";
	protected $fillable=['route', 'image_id'];

	//relacion uno a muchos inversa entre image y variantImage
	public function image()
	{
		return $this->belongsto('App\Image');
	}
}
