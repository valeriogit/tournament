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