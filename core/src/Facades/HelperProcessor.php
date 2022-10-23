<?php

namespace EvolutionCMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string makeFilename($pathinfo, $params)
 * @method static string makeFilePath($newFilename, $pathinfo, $params)
 * @method static string phpThumb($input = '', $options = '', $webp = true)
 *
 * @see \EvolutionCMS\HelperProcessor
 */
class HelperProcessor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'HelperProcessor';
    }
}
