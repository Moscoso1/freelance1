<?php
use App\Session\CustomDatabaseSessionHandler;
use Illuminate\Database\ConnectionInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('session', function ($app) {
            $handler = new CustomDatabaseSessionHandler(
                $app['db']->connection(), 'sessions'
            );

            return new \Illuminate\Session\SessionManager($app, $handler);
        });
    }

    public function boot()
    {
        //
    }
}

