<?php

namespace Builder\TableBuilder;

use Illuminate\Support\ServiceProvider;

class TableBuilderServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function register()
    { }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/config/action' => config_path('builder-action.php')
        ], 'config');
    }
}
