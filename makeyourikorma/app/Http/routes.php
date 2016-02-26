<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//RUTA DE LA PAGINA PRINCIPAL
Route::get('/', [
	'uses' => 'WelcomeController@index',
	'as'   => 'home'
]);

//TURA PARA EL MYI
Route::get('/myi', [
	'uses' => 'MyiController@index',
	'as'   => 'myi'
]);



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//RUTAS PARA EL INICIO DE SESION CON FACE

//Route::get('social', 'SocialController@getSocialAuth');
//Route::get('social/callback', 'SocialController@getSocialAuthCallback');
