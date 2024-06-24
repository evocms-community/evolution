<?php

namespace EvolutionCMS\Services;

class ConfigService
{
    /**
     * @param string $config
     * @param $default
     *
     * @return bool|float|int|mixed|string|null
     */
    public function get(string $config = '', $default = null)
    {
        return evo()->getConfig($config, $default);
    }

    /**
     * @param $name
     * @param $value
     *
     * @return void
     */
    public function set($name, $value)
    {
        evo()->setConfig($name, $value);
    }
}
