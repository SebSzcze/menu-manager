<?php

namespace Lari\MenuManager;

use Illuminate\Support\ServiceProvider;
use Lari\MenuManager\Commands\BuildMenuSlotsCommand;

class MenuManagerServiceProvider extends ServiceProvider
{
    const COMMANDS = [
        BuildMenuSlotsCommand::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../views', 'menumanager');

        $this->publishes([
            __DIR__.'/../config/menu.php' => config_path('menu.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands(static::COMMANDS);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/menu.php', 'menu'
        );
    }
}
