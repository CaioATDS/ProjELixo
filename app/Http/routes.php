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
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

// Generate a login URL
Route::get('/facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Send an array of permissions to request
    $login_url = $fb->getLoginUrl(['email']);

    // Obviously you'd do this in blade :)
    echo '<a href="' . $login_url . '">Login with Facebook</a>';
});

// Endpoint that is redirected to after an authentication attempt
Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler
        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email');
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    $facebook_user = $response->getGraphUser();

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.

    $user = App\User::createOrUpdateGraphNode($facebook_user);

    // Log the user into Laravel
    \Illuminate\Support\Facades\Auth::login($user);

    return redirect('/')->with('message', 'Successfully logged in with Facebook');
});

// perfil rota
Route::group(['prefix' => 'Perfil', 'middleware' => [ 'auth', 'roles:Usuário', ], ], function(){

    Route::get('Editar/{id?}',  [ 'as' => 'profile', ProfileController::edit(),     ]);
    Route::post('Editar/{id?}', [ 'as' => 'profile', ProfileController::update(),   ]);
    Route::post('/Senha{id?}',  [ 'as' => 'profile', ProfileController::senha(),    ]);
    Route::get('/{id?}',        [ 'as' => 'profile', ProfileController::index(),    ]);

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
Route::controller('/password', 'Auth\PasswordController');
Route::get('User/Sair',        [ 'as' => 'logout', 'middleware' => 'auth',  LogoutController::logout(),  ]);
Route::group(['prefix' => 'User', 'middleware' => 'guest', ], function(){

    Route::get('/Cadastro',    [ 'as' => 'signup',      SignupController::index(),   ]);
    Route::post('/Cadastro',   [ 'as' => 'signuping',   SignupController::post(),    ]);
    Route::get('/Entrar',      [ 'as' => 'login',       LoginController::index(),    ]);
    Route::post('/Entrar',     [ 'as' => 'logining',    LoginController::post(),     ]);

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

