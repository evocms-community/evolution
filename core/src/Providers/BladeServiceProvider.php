<?php namespace EvolutionCMS\Providers;

use EvolutionCMS\Support\BladeDirective;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $directives = $this->app['config']->get('view.directive');
        if (\is_array($directives)) {
            foreach ($directives as $name => $callback) {
                $this->app->get('blade.compiler')->directive($name, $callback);
            }
        }

        Blade::if('auth', function (string $context = 'web') {
            return evo()->getLoginUserID($context) !== false;
        });

        Blade::if('guest', function (string $context = 'web') {
            return evo()->getLoginUserID($context) === false;
        });

        Blade::if('locale', function (string $locale) {
            return $locale === evo()->getLocale();
        });

        Blade::directive('parse', function () {
            return '<?php ob_start(); ?>';
        });

        Blade::directive('endparse', function () {
            return '<?php echo evo_parser(ob_get_clean()); ?>';
        });
    }
}
