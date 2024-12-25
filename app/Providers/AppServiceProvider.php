<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
