<?php
namespace Valeriogit\Tournament;

use Illuminate\Support\ServiceProvider;

class TournamentServiceProvider extends ServiceProvider
{
    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/tournament_config.php' => config_path('tournament_config.php'),
        ], 'tournament-config');
    }
    /**
    * Make config publishment optional by merging the config from the package.
    *
    * @return  void
    */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/tournament_config.php',
            'tournament_config'
        );
    }
}