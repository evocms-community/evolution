<?php

namespace EvolutionCMS;

use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Events;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Application as SymfonyApplication;
use Symfony\Component\Console\Input\InputDefinition;

class Console extends Artisan
{
    /**
     * @param Container $laravel
     * @param Dispatcher $events
     * @param $version
     */
    public function __construct(Container $laravel, Dispatcher $events, $version)
    {
        SymfonyApplication::__construct($laravel->getVersionData('branch'), $version);
        $this->laravel = $laravel;
        $this->events = $events;
        $this->setAutoExit(false);
        $this->setCatchExceptions(false);
        $this->SetRequestForConsole();
        $this->events->dispatch(new Events\ArtisanStarting($this));

        $laravel->loadDeferredProviders();

        parent::bootstrap();
    }

    /**
     * @return InputDefinition
     */
    protected function getDefaultInputDefinition(): InputDefinition
    {
        return SymfonyApplication::getDefaultInputDefinition();
    }

    /**
     * @return void
     */
    private function SetRequestForConsole()
    {
        $uri = Config::get('global.site_url');
        $components = parse_url($uri);
        $server = $_SERVER;

        if (isset($components['path'])) {
            $server = array_merge($server, [
                'SCRIPT_FILENAME' => $components['path'],
                'SCRIPT_NAME' => $components['path'],
            ]);
        }

        evo()->instance(
            'request',
            Request::create($uri, 'GET', [], [], [], $server)
        );
    }
}
