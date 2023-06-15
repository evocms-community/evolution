<?php

namespace EvolutionCMS\Directory;

use EvolutionCMS\ServiceProvider;

class DirectoryServiceProvider extends ServiceProvider
{
    protected $namespace = 'directory';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->registerRoutingModule('Directory', __DIR__ . '/../routes.php', null, true);
        $this->loadPluginsFrom(__DIR__ . '/../plugins/');

        $this->app->alias(Directory::class, 'directory');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', $this->namespace);
        $this->loadTranslationsFrom(__DIR__ . '/../lang', $this->namespace);

        $this->publishes([
            __DIR__ . '/../publishable/assets'  => MODX_BASE_PATH . 'assets',
            __DIR__ . '/../publishable/configs' => EVO_CORE_PATH . 'custom/directory',
        ]);
    }
}
