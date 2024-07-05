<?php

namespace EvolutionCMS\Providers;

use EvolutionCMS\Session\SessionManager;
use Illuminate\Contracts\Cache\Factory as CacheFactory;
use EvolutionCMS\Middleware\StartSession;
use Illuminate\Session\SessionServiceProvider as IlluminateSessionServiceProvider;

class SessionServiceProvider extends IlluminateSessionServiceProvider
{
    public function register()
    {
        $this->registerSessionManager();

        $this->registerSessionDriver();

        $this->app->singleton(StartSession::class, function ($app) {
            return new StartSession($app->make(SessionManager::class), function () use ($app) {
                return $app->make(CacheFactory::class);
            });
        });
    }

    protected function registerSessionManager()
    {
        $this->app->singleton('session', function ($app) {
            return new SessionManager($app);
        });
    }
}
