<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Session\SessionManager;
use App\Session\CustomDatabaseSessionHandler;  // Correct the namespace to App\Session

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the custom session handler
        $this->app->singleton('session', function ($app) {
            // Create an instance of your custom session handler
            $handler = new CustomDatabaseSessionHandler(
                $app['db']->connection(), 'sessions'  // 'sessions' is the name of the session table
            );

            // Return a new instance of the SessionManager with the custom handler
            return new SessionManager($app, $handler);
        });
    }

    public function boot()
    {
        // Any bootstrapping needed for your service provider
    }
}
