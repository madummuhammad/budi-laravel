<?php
 
namespace App\Providers;
 
use App\Session\DatabaseSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
 
class SessionServiceProvider extends ServiceProvider
{
 
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        Session::extend('app.database', function ($app) {
            $connectionName     = $this->app->config->get('session.connection');
            $databaseConnection = $app->app->db->connection($connectionName);

            $table = $app['config']['session.table'];
            $minutes = $app['config']['session.lifetime'];

            return new DatabaseSessionHandler($databaseConnection, $table, $minutes);
        });
    }
}