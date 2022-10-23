<?php

namespace EvolutionCMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static getBladeDocumentContent()
 * @method static mixed getTemplateCodeFromDB($templateID)
 * @method static string setPsrClassNames(string $templateAlias)
 *
 * @see \EvolutionCMS\TemplateProcessor
 */
class TemplateProcessor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'TemplateProcessor';
    }
}
