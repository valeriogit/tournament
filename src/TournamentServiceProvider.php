<?php
namespace Valeriogit\Tournament;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class TournamentServiceProvider extends ServiceProvider
{
    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
        // Publish views
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('tournament'),
            __DIR__.'/../resources/views' => resource_path('views/tournament'),
        ], 'tournament-views');

        $this->publishes([
            __DIR__.'/../config/tournament_config.php' => config_path('tournament_config.php'),
        ], 'tournament-config');

        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tournament');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('tournament.prefix'),
            'middleware' => config('tournament.middleware'),
        ];
    }

    /**
    * Make config publishment optional by merging the config from the package.
    *
    * @return  void
    */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/tournament_config.php', 'tournament'
        );
    }
}