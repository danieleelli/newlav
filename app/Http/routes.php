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

Route::resource('makers', 'MakerController', ['except' => ['edit', 'create']]);
Route::resource('vehicles', 'VehicleController', ['only' => ['index', 'show']]);
Route:resource('makers.vehicles', 'MakerVehiclesController');
Route::post('oauth/access_token', function(){
    return response()->json(Authorizer::issueAccessToken());
});
/*Route::get('/', function () {
    return view('welcome');
});*/
