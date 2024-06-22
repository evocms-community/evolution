<?php

namespace EvolutionCMS\Providers;

use Illuminate\Translation\FileLoader;

class TranslationServiceProvider extends \Illuminate\Translation\TranslationServiceProvider
{
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new FileLoader($app['files'], [$app['path.lang'], EVO_CORE_PATH . 'custom/lang/']);
        });
    }
}
