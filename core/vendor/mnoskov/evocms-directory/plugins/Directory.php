<?php

Event::listen('evolution.OnManagerNodePrerender', function($params) {
    $configs = evo()->directory->getConfigs();

    if (isset($configs[ $params['ph']['id'] ])) {
        $config = evo()->directory->getConfig($params['ph']['id']);

        $params['ph'] = array_merge(
            $params['ph'],
            $config['tree_config'],
            [
                'tree_page_click' => route('directory::show', $params['ph']['id']),
                'showChildren'    => '0',
            ]
        );
    }

    return serialize($params['ph']);
});

Event::listen('evolution.OnManagerTreePrerender', function($params) {
    return evo()->directory->registerTreeScript();
});
