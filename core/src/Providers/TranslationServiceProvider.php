<?php

namespace EvolutionCMS\Providers;

use Illuminate\Translation\FileLoader;

class TranslationServiceProvider extends \Illuminate\Translation\TranslationServiceProvider
{
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new class($app['files'], [$app['path.lang'], EVO_CORE_PATH . 'custom/lang/']) extends FileLoader {
                protected function loadPath($path, $locale, $group)
                {
                    return collect($path)
                        ->reduce(function ($output, $_path) use ($locale, $group) {
                            if ($this->files->exists($full = "{$_path}/{$locale}/{$group}.php")) {
                                $output = array_replace_recursive($output, $this->files->getRequire($full));
                            }

                            return $output;
                        }, []);
                }
            };
        });
    }
}
