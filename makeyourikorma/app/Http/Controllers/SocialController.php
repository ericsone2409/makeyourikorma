<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Socialize;


class SocialController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

 	public function getSocialAuth()
	{
	    return Socialize::with('facebook')->redirect();
	}


 	public function getSocialAuthCallback()
	{

		$userSocial = Socialize::with('facebook')->user();

		$id = $userSocial->getId();

		$user = User::where('social_id', '=', $id)->first();
		if ($user) {
			//return de prueba
			return "<h2>".$userSocial->getId()." Todo bienn!</h2>";
		}else{
			$usuario->save();
			//return de prueba
			$usuario = User::create(['social_id'=>$userSocial->getId() ,'name'=>$userSocial->getName()]);
			return "<h2>".$userSocial->getId()." Todo bien!</h2>";
		}


		//return redirect()->route('la ruta en donde este el makeyourikorma')->with('userSocial', $UserSocial);
	}


}
