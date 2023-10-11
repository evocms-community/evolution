<?php

use EvolutionCMS\Models\SystemSetting;

if (!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die('<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.');
}

// get the settings from the database.
$settings = [];
if (evo() && count(evo()->config) > 0) {
    $settings = evo()->config;
} else {
    $settings = SystemSetting::all()->pluck('setting_value', 'setting_name');
}

extract($settings);

// setup default site id - new installation should generate a unique id for the site.
if (!isset($site_id)) {
    $site_id = 'MzGeQ2faT4Dw06+U49x3';
}
