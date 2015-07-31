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
use App\Http\Controllers\routes\StaticasController;
use App\Http\Controllers\routes\SubCategoriasController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Administrator\ColetaController;
use App\Http\Controllers\Users\UsersController;

// apenas logados
Route::group(['prefix' => '', 'middleware' => 'auth', 'roles:Usuário', ], function(){

    Route::get('/Perfil/{id?}',       [ 'as' => 'profile', ProfileController::index(),    ]);

});

// rotas publicas paginas estáticas
Route::group(['prefix' => ''], function(){

    Route::get('/Parceiros',    [ 'as' => 'parceiros',  StaticasController::parceiros(), ]);
    Route::get('/Projeto',      [ 'as' => 'projeto',    StaticasController::projeto(),   ]);
    Route::get('/Mapa',         [ 'as' => 'mapa',       StaticasController::mapa(),      ]);
    Route::get('/Pontos',       [ 'as' => 'pontos',     StaticasController::pontos(),    ]);
    Route::get('/{home?}',      [ 'as' => 'home',       HomeController::index(),         ]);

});

// Authentication routes...
Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\PasswordController');

Route::group(['prefix' => 'Subcategoria', 'middleware' => 'auth', 'roles:Usuário', ], function() {

    Route::get('/{id}',         [ 'as' => 'subcat', SubCategoriasController::index(), ]);

});

Route::group(['prefix' => 'Admin', 'middleware' => ['auth', 'roles:Aluno',], ], function(){

    Route::get('/Coleta',       [ 'as' => 'coleta',     ColetaController::index(),      ]);
    Route::get('/Coletados',    [ 'as' => 'coletados',  ColetaController::coletados(),  ]);
    Route::post('/Coletar',     [ 'as' => 'coletar',    ColetaController::store(),      ]);
    Route::get('/Usuarios',     [ 'as' => 'usuarios',   UsersController::index(),       ]);

});

Route::group(['prefix' => 'Admin', 'middleware' => ['auth', 'roles:Aluno',], ], function(){

    Route::get('/Coleta',       ColetaController::index()       );
    Route::get('/Coletados',    ColetaController::coletados()   );
    Route::post('/Coletar',     ColetaController::store()       );

});

Route::group(['prefix' => 'itens', 'middleware' => 'auth', 'roles:Usuário', ], function(){

    Route::post('/selecionar',      ItensController::selecionar()   );
    Route::post('/Reciclar',        ItensController::reciclar()     );
    Route::get('/lixeira',          ItensController::lixeira()      );
    Route::get('/reciclados/{id?}', ItensController::reciclados()   );

});