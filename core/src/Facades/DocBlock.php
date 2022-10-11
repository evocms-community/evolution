<?php

namespace EvolutionCMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array parseFromFile($element_dir, $filename)
 * @method static array parseFromString($string)
 * @method static array parseLine($line, $docblock_start_found, $name_found, $description_found, $docblock_end_found)
 * @method static string convertIntoList($parsed)
 *
 * @see \EvolutionCMS\Support\DocBlock
 */
class DocBlock extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'DocBlock';
    }
}
