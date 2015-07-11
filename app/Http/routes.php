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

use App\Http\Controllers\routes\HomeController;

Route::group(['prefix' => ''], function(){

    Route::get('/{home?}', [ 'as' => 'home', HomeController::index() ]);

});

Route::get('/Parceiros', function () {
    return view('Pages.Parceiros');
});

Route::get('/Projeto', function () {
    return view('Pages.Projeto');
});

Route::get('/Mapa', function () {
    return view('Pages.Mapa');
});

Route::get('/Pontos', function () {
    return view('Pages.Pontos');
});

// Authentication routes...
Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\PasswordController');