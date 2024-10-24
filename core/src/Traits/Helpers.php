<?php namespace EvolutionCMS\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

trait Helpers
{
    abstract public function getConfig($name = '', $default = null);

    /**
     * @param null|int $time
     * @return int
     */
    public function timestamp($time = null) : int
    {
        return ($time === null ? time() : (int)$time) + $this->getConfig('server_offset_time');
    }

    /**
     * @return Carbon
     */
    public function now() : Carbon
    {
        return Carbon::now()->addSeconds(
            Config::get('global.server_offset_time')
        );
    }

    public function normalizeFormat($withTime = true) : string
    {
        return str_replace('%', '', $this->toDateFormat(0, 'formatOnly')) .
            ($withTime ? ' H:i:s' : '');
    }

    /**
     * Determine if the application is running with debug mode enabled.
     *
     * @return bool
     */
    public function hasDebugModeEnabled()
    {
        return (bool) $this['config']->get('app.debug');
    }
}
