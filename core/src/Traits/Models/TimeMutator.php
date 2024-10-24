<?php

namespace EvolutionCMS\Traits\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

trait TimeMutator
{
    protected function convertTimestamp($value): ?Carbon
    {
        if (empty($value)) {
            return null;
        }

        $out = $this->asDateTime($value)->addSeconds(Config::get('global.server_offset_time'));

        $out::setToStringFormat(evo()->normalizeFormat());

        return $out;
    }
}
