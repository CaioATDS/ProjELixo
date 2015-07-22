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
use App\Http\Controllers\routes\ItensController;
use App\Http\Controllers\routes\SubCategoriasController;
use App\Http\Controllers\Profile\ProfileController;

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

// apenas logados
Route::group(['prefix' => '', 'middleware' => 'auth', ], function(){

    Route::get('/Perfil', [ 'as' => 'profile', ProfileController::index(), ]);

});

// rotas publicas
Route::group(['prefix' => ''], function(){

    Route::get('/{home?}', [ 'as' => 'home', HomeController::index(), ]);

});

// Authentication routes...
Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\PasswordController');

Route::group(['prefix' => 'Subcategoria', 'middleware' => 'auth', ], function() {

    Route::get('/{id}',         [ 'as' => 'subcat,      ', SubCategoriasController::index(), ]);

});

Route::group(['prefix' => 'itens', 'middleware' => 'auth', ], function(){

    Route::post('/selecionar',  ItensController::selecionar()   );
    Route::post('/Reciclar',    ItensController::reciclar()     );
    Route::get('/lixeira',      ItensController::lixeira()      );
    Route::get('/reciclados',   ItensController::reciclados()   );

});