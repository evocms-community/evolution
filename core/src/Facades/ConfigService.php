<?php

namespace EvolutionCMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool|float|int|mixed|string|null get(string $config = '', $default = null)
 * @method static void set($name, $value)
 *
 * @see \EvolutionCMS\Services\ConfigService
 */
class ConfigService extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ConfigService';
    }
}
