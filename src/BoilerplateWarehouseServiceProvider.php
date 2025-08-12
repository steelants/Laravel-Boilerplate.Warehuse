<?php

namespace SteelAnts\LaravelBoilerplate\Warehouse;

use Illuminate\Support\ServiceProvider;

class BoilerplateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'boilerplate-warehouse');

        if ($this->app->runningInConsole()) {
            $this->bootConsole();
        }
    }

    public function bootConsole()
    {
        $this->publishesMigrations([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'boilerplate-warehouse-migrations');
        
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/boilerplate-warehouse'),
        ]);
    }

    public function register() {}
}
