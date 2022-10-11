<?php

namespace EvolutionCMS\Facades;

use Illuminate\Support\Facades\Facade;
use Symfony\Component\Console\Input\InputDefinition;

/**
 * @method static InputDefinition getDefaultInputDefinition()
 * @method static void SetRequestForConsole()
 *
 * @see \EvolutionCMS\Console
 */
class Console extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Console';
    }
}
