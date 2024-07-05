<?php
return [
    'paths'     => [
        MODX_BASE_PATH . 'views/'
    ],
    'compiled'  => EVO_STORAGE_PATH . 'blade',
    'directive' => [
        'evoParser'         => [EvolutionCMS\Support\BladeDirective::class, 'evoParser'],
        'makeUrl'           => [EvolutionCMS\Support\BladeDirective::class, 'makeUrl'],
        'config'            => [EvolutionCMS\Support\BladeDirective::class, 'config'],
        'phpthumb'          => [EvolutionCMS\Support\BladeDirective::class, 'phpthumb']
    ]
];
