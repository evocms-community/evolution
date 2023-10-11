<?php

use EvolutionCMS\Facades\ManagerTheme;

?><!-- Miscellaneous settings -->
<div class="tab-page" id="tabPage7">
    <h2 class="tab">{{ ManagerTheme::getLexicon('settings_misc') }}</h2>
    <script>tpSettings.addTabPage(document.getElementById('tabPage7'))</script>
    <div class="container container-body">

        @include('manager::form.row', [
            'label' => ManagerTheme::getLexicon('filemanager_path_title'),
            'small' => '[(filemanager_path)]',
            'for' => 'filemanager_path',
            'element' => ManagerTheme::getLexicon('default') . '
                <span id="default_filemanager_path">[(base_path)]</span><br>
                <div class="input-group">' .
                    view('manager::form.inputElement', [
                        'name' => 'filemanager_path',
                        'value' => $settings['filemanager_path'],
                        'attributes' => 'onChange="documentDirty=true;" maxlength="255"'
                    ]) .
                    '<div class="input-group-btn">' .
                        view('manager::form.inputElement', [
                            'type' => 'button',
                            'name' => 'reset_filemanager_path',
                            'value' => ManagerTheme::getLexicon('reset'),
                            'attributes' => 'onclick="reset_path(\'filemanager_path\');"'
                        ]) .
                    '</div>
                </div>',
            'comment' => ManagerTheme::getLexicon('filemanager_path_message')
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'upload_files',
            'label' => ManagerTheme::getLexicon('uploadable_files_title'),
            'small' => '[(upload_files)]',
            'value' => $settings['upload_files'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['upload_files']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('uploadable_files_message'),
            'disabled' => $disabledSettings['upload_files'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'upload_images',
            'label' => ManagerTheme::getLexicon('uploadable_images_title'),
            'small' => '[(upload_images)]',
            'value' => $settings['upload_images'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['upload_images']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('uploadable_images_message'),
            'disabled' => $disabledSettings['upload_images'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'upload_media',
            'label' => ManagerTheme::getLexicon('uploadable_media_title'),
            'small' => '[(upload_media)]',
            'value' => $settings['upload_media'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['upload_media']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('uploadable_media_message'),
            'disabled' => $disabledSettings['upload_media'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'upload_maxsize',
            'label' => ManagerTheme::getLexicon('upload_maxsize_title'),
            'small' => '[(upload_maxsize)]',
            'value' => $settings['upload_maxsize'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['upload_maxsize']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('upload_maxsize_message'),
            'disabled' => $disabledSettings['upload_maxsize'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'new_file_permissions',
            'label' => ManagerTheme::getLexicon('new_file_permissions_title'),
            'small' => '[(new_file_permissions)]',
            'value' => $settings['new_file_permissions'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
            'comment' => (isset($disabledSettings['new_file_permissions']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('new_file_permissions_message'),
            'disabled' => $disabledSettings['new_file_permissions'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'new_folder_permissions',
            'label' => ManagerTheme::getLexicon('new_folder_permissions_title'),
            'small' => '[(new_folder_permissions)]',
            'value' => $settings['new_folder_permissions'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
            'comment' => (isset($disabledSettings['new_folder_permissions']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('new_folder_permissions_message'),
            'disabled' => $disabledSettings['new_folder_permissions'] ?? null
        ])

        <div class="split my-1"></div>

        {!! get_by_key($tabEvents, 'OnFileManagerSettingsRender') !!}
    </div>
</div>

