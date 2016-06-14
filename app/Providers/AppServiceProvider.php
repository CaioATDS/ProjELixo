<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(LaravelFacebookSdk $fb)
    {

        view()->share(['login_url' => $fb->getLoginUrl(['email']),]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
