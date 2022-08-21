<?php


namespace Pathologic\EvolutionCMS\DoctrineCache;
use Illuminate\Cache\CacheServiceProvider;
use Illuminate\Cache\MemcachedConnector;
use Illuminate\Cache\RateLimiter;

class ServiceProvider extends CacheServiceProvider
{
    public function register()
    {
        $this->app->singleton('cache', function ($app) {
            return new CacheBridge($app);
        });

        $this->app->singleton('cache.store', function ($app) {
            return $app['cache']->driver();
        });

        $this->app->singleton('cache.psr6', function ($app) {
            return new Psr16Adapter($app['cache.store']);
        });

        $this->app->singleton('memcached.connector', function () {
            return new MemcachedConnector;
        });

        $this->app->singleton(RateLimiter::class);
    }
}