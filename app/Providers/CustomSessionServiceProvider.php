<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Str;
use Illuminate\Session\DatabaseSessionHandler;

class CustomSessionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('session', function ($app) {
            $sessionManager = new SessionManager($app);

            // Override the session driver with custom behavior
            $sessionManager->extend('database', function ($app) {
                // Use the default database session handler but with a custom session ID generator
                $handler = new DatabaseSessionHandler(
                    $app['db']->connection()->getPdo(), // PDO connection to the database
                    $app['config']['session.table']     // Session table name
                );

                // Override the generateSessionId method to produce an integer session ID
                $handler->setSessionIdGenerator(function () {
                    return rand(100000, 999999); // Generate a random integer session ID
                });

                return $this->getSessionStore($app, $handler);
            });

            return $sessionManager;
        });
    }

    /**
     * Get the session store instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Session\Store  $handler
     * @return \Illuminate\Session\Store
     */
    protected function getSessionStore($app, $handler)
    {
        $name = $app['config']['session.name'];
        $store = new \Illuminate\Session\Store($name, $handler);

        return $store;
    }
}
