<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Facebook\Exceptions\FacebookSDKException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Session;

class FacebookCallbackController extends Controller
{

    public static function index()
    {
        return function(LaravelFacebookSdk $fb, User $user)
        {
            // Obtain an access token.
            try {
                $token = $fb->getAccessTokenFromRedirect();
            } catch (FacebookSDKException $e) {
                return Redirect::back()->withErrors('Algo saiu errado! ' . $e->getMessage());
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
                return Redirect::back()->withErrors([
                    'Algo saiu errado! ',
                    $helper->getError(),
                    $helper->getErrorCode(),
                    $helper->getErrorReason(),
                    $helper->getErrorDescription()
                ]);

            }

            if (! $token->isLongLived()) {
                // OAuth 2.0 client handler
                $oauth_client = $fb->getOAuth2Client();

                // Extend the access token.
                try {
                    $token = $oauth_client->getLongLivedAccessToken($token);
                } catch (FacebookSDKException $e) {
                    return Redirect::back()->withErrors('Algo saiu errado! ' . $e->getMessage());
                }
            }

            $fb->setDefaultAccessToken($token);

            // Save for later
            Session::put('fb_user_access_token', (string) $token);

            // Get basic info on the user from Facebook.
            try {
                $response = $fb->get('/me?fields=id,first_name,last_name,email,picture,gender,link');
            } catch (FacebookSDKException $e) {
                return Redirect::back()->withErrors('Algo saiu errado! ' . $e->getMessage());
            }

            // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
            $facebook_user = $response->getGraphUser();

            // Create the user if it does not exist or update the existing entry.
            // This will only work if you've added the SyncableGraphNodeTrait to your User model.

            $user = $user->createOrUpdateGraphNode($facebook_user);

            // Log the user into Laravel
            Auth::login($user);

            return redirect('/')->with('message', 'Você entrou com sua conta do Facebook.');
        };
    }

}
