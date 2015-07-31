<?php
/*
 *
 * Rodrigo Brandao
 * ro.brandao@outlook.com
 * 18-99701-9800
 * www.bitmaniaco.com
 *
 * 1º ano de Sistema de Informaçoes
 * junho - 2015
 * Projeto e-Lixo
 * Faculdade Toledo de Presidente Prudente
 *
 */

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
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\LogoutController;
use App\Http\Controllers\Users\SignupController;
use App\Http\Controllers\Users\UsersController;

// apenas logados
Route::group(['prefix' => '', 'middleware' => [ 'auth', 'roles:Usuário', ], ], function(){

    Route::get('/Perfil/{id?}',       [ 'as' => 'profile', ProfileController::index(),    ]);

});

// rotas publicas paginas estáticas
Route::group(['prefix' => '',], function(){

    Route::get('/Parceiros',    [ 'as' => 'parceiros',  StaticasController::parceiros(), ]);
    Route::get('/Projeto',      [ 'as' => 'projeto',    StaticasController::projeto(),   ]);
    Route::get('/Mapa',         [ 'as' => 'mapa',       StaticasController::mapa(),      ]);
    Route::get('/Pontos',       [ 'as' => 'pontos',     StaticasController::pontos(),    ]);
    Route::get('/{home?}',      [ 'as' => 'home',       HomeController::index(),         ]);

});

// Authentication routes...
Route::get('User/Sair',        [ 'as' => 'logout', 'middleware' => 'auth',  LogoutController::logout(),  ]);
Route::group(['prefix' => 'User', 'middleware' => 'guest', ], function(){

    Route::get('/Cadastro',    [ 'as' => 'signup',      SignupController::index(),   ]);
    Route::post('/Cadastro',   [ 'as' => 'signuping',   SignupController::post(),    ]);
    Route::get('/Entrar',      [ 'as' => 'login',       LoginController::index(),    ]);
    Route::post('/Entrar',     [ 'as' => 'logining',    LoginController::post(),    ]);

});

Route::group(['prefix' => 'Subcategoria', 'middleware' => [ 'auth', 'roles:Usuário', ], ], function() {

    Route::get('/{id}', [ 'as' => 'subcat', SubCategoriasController::index(), ]);

});

Route::group(['prefix' => 'Admin', 'middleware' => [ 'auth', 'roles:Aluno', ], ], function(){

    Route::get('/Coleta',       [ 'as' => 'coleta',     ColetaController::index(),      ]);
    Route::get('/Coletados',    [ 'as' => 'coletados',  ColetaController::coletados(),  ]);
    Route::post('/Coletar',     [ 'as' => 'coletar',    ColetaController::store(),      ]);
    Route::get('/Usuarios',     [ 'as' => 'usuarios',   UsersController::index(),       ]);

});

Route::group(['prefix' => 'itens', 'middleware' => [ 'auth', 'roles:Usuário', ], ], function(){

    Route::post('/selecionar',      [ 'as' => 'selecionar', ItensController::selecionar(),  ]);
    Route::post('/Reciclar',        [ 'as' => 'reciclar',   ItensController::reciclar(),    ]);
    Route::get('/lixeira',          [ 'as' => 'lixeira',    ItensController::lixeira(),     ]);
    Route::get('/reciclados/{id?}', [ 'as' => 'reclicados', ItensController::reciclados(),  ]);

});

