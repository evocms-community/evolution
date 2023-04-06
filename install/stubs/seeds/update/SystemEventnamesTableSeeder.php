<?php

namespace EvolutionCMS\Installer\Update;

use Illuminate\Database\Seeder;

class SystemEventnamesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('system_eventnames')->whereIn('name', [
            'OnBeforeManagerLogout',
            'OnBeforeManagerLogin',
            'OnManagerAuthentication',
            'OnManagerChangePassword',
            'OnManagerCreateGroup',
            'OnManagerDeleteUser',
            'OnManagerLogin',
            'OnManagerLogout',
            'OnManagerSaveUser',
            'OnBeforeWUsrFormDelete',
            'OnBeforeWUsrFormSave',
            'OnWUsrFormDelete',
            'OnWUsrFormPrerender',
            'OnWUsrFormRender',
            'OnWUsrFormSave',
            'OnWebDeleteUser',
            'OnWebSaveUser'
        ])->delete();

        $rename = [
            'OnWebAuthentication' => 'OnUserAuthentication',
            'OnBeforeWebLogin' => 'OnBeforeUserLogin',
            'OnBeforeWebLogout' => 'OnBeforeUserLogout',
            'OnWebChangePassword' => 'OnUserChangePassword',
            'OnWebCreateGroup' => 'OnCreateUserGroup',
            'OnWebLogin' => 'OnUserLogin',
            'OnWebLogout' => 'OnUserLogout',
        ];
        foreach ($rename as $old => $new) {
            \DB::table('system_eventnames')->where('name', $old)->update([
                'name' => $new,
                'groupname' => 'Users',
                'service' => 1
            ]);
        }
        \DB::table('system_eventnames')->where('name', 'onBeforeMoveDocument')->update([
            'name' => 'OnBeforeMoveDocument',
        ]);
        \DB::table('system_eventnames')->where('name', 'onAfterMoveDocument')->update([
            'name' => 'OnAfterMoveDocument',
        ]);
        \DB::table('system_eventnames')->insert([
            'name' => 'OnBeforeMailSend', 'service' => '1', 'groupname' => '',
        ]);
    }
}
