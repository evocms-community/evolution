<?php

namespace EvolutionCMS\Installer\Update;

use Illuminate\Database\Seeder;

class SystemSettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $res = \DB::table('system_settings')
            ->where('setting_name', '=', 'aliaslistingfolder')
            ->orWhere('setting_name', '=', 'full_aliaslisting')
            ->get()
            ->toArray();

        $values = [];
        foreach ($res as $row) {
            $values[$row->setting_name] = $row->setting_value;
        }
        if (isset($values['full_aliaslisting']) || isset($values['aliaslistingfolder'])) {
            $value = 0;
            if (isset($values['full_aliaslisting']) && $values['full_aliaslisting'] == 1) {
                $value = 1;
            } elseif (isset($values['aliaslistingfolder']) && $values['aliaslistingfolder'] == 1) {
                $value = 2;
            }

            $insertArray = [
                ['setting_name' => 'alias_listing', 'setting_value' => $value],
            ];
            \DB::table('system_settings')->insert($insertArray);

            $deleteArray = [
                'aliaslistingfolder',
                'full_aliaslisting',
            ];
            foreach ($deleteArray as $value) {
                \DB::table('system_settings')->where('setting_name', $value)->delete();
            }
        }
    }
}
