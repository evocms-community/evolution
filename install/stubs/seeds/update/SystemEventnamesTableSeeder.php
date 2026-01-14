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
        \DB::table('system_eventnames')->insertOrIgnore([
            'name' => 'OnBeforeMailSend', 'service' => '1', 'groupname' => '',
        ]);

        // --- document event changes
        $insert2 = [
            ['name' => 'OnBeforeDocCreate', 'service' => 1, 'groupname' => 'Documents',],
            ['name' => 'OnDocCreate', 'service' => 1, 'groupname' => 'Documents',],
            ['name' => 'OnBeforeDocEdit', 'service' => 1, 'groupname' => 'Documents',],
            ['name' => 'OnDocEdit', 'service' => 1, 'groupname' => 'Documents',],
            ['name' => 'OnBeforeDocSetGroups', 'service' => 1, 'groupname' => 'Documents',],
            ['name' => 'OnDocSetGroups', 'service' => 1, 'groupname' => 'Documents',],
            ['name' => 'OnBeforeDocPublish', 'service' => 1, 'groupname' => 'Documents',],
            ['name' => 'OnBeforeDocUnpublish', 'service' => 1, 'groupname' => 'Documents',],
            ['name' => 'OnBeforeDocUndelete', 'service' => 1, 'groupname' => 'Documents',],
        ];
        foreach ($insert2 as $el) {
            \DB::table('system_eventnames')
                ->insertOrIgnore($el);
        }

        $delete2 = [
            'OnBeforeDocFormSave',
            'OnDocFormSave',
        ];
        \DB::table('system_eventnames')->whereIn('name', $delete2)->delete();

        $rename2 = [
            'OnBeforeDocFormDelete' => 'OnBeforeDocDelete',
            'OnDocFormDelete' => 'OnDocDelete',
            'OnDocFormUnDelete' => 'OnDocUndelete',
            'OnDocPublished' => 'OnDocPublish',
            'OnDocUnPublished' => 'OnDocUnpublish',
        ];
        foreach ($rename2 as $old => $new) {
            \DB::table('system_eventnames')
                ->where('name', $old)
                ->update([
                    'name' => $new,
                    'groupname' => 'Documents',
                    'service' => 1
                ]);
        }
    }
}
