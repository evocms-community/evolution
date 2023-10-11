<?php

use EvolutionCMS\Facades\ManagerTheme;

?><!-- KCFinder settings -->
<div class="tab-page" id="tabPage8">
    <h2 class="tab">{{ ManagerTheme::getLexicon('settings_KC') }}</h2>
    <script>tpSettings.addTabPage(document.getElementById('tabPage8'));</script>
    <div class="container container-body">

        @include('manager::form.radio', [
            'name' => 'use_browser',
            'label' => ManagerTheme::getLexicon('rb_title'),
            'small' => '[(use_browser)]',
            'value' => $settings['use_browser'],
            'options' => [
                1 => [
                    'text' => ManagerTheme::getLexicon('yes'),
                    'attributes' => 'id="rbRowOn"'
                ],
                0 => [
                    'text' => ManagerTheme::getLexicon('no'),
                    'attributes' => 'id="rbRowOff"'
                ]
            ],
            'comment' => (isset($disabledSettings['use_browser']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('rb_message'),
            'disabled' => $disabledSettings['use_browser'] ?? null
        ])

        <div class="split my-1"></div>

        <div class="rbRow" @if(!$settings['use_browser']) style="display: none;" @endif>
            @include('manager::form.select', [
                'name' => 'which_browser',
                'label' => ManagerTheme::getLexicon('which_browser_default_title'),
                'small' => '[(which_browser)]',
                'value' => $settings['which_browser'],
                'attributes' => 'onChange="documentDirty=true;" size="1"',
                'options' => $fileBrowsers,
                'as' => 'values',
                'comment' => (isset($disabledSettings['which_browser']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('which_browser_default_msg'),
                'disabled' => $disabledSettings['which_browser'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'rb_webuser',
                'label' => ManagerTheme::getLexicon('rb_webuser_title'),
                'small' => '[(rb_webuser)]',
                'value' => $settings['rb_webuser'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['rb_webuser']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('rb_webuser_message'),
                'disabled' => $disabledSettings['rb_webuser'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.row', [
                'label' => ManagerTheme::getLexicon('rb_base_dir_title'),
                'small' => '[(rb_base_dir)]',
                'for' => 'rb_base_dir',
                'element' => ManagerTheme::getLexicon('default') . '
                    <span id="default_rb_base_dir">[(base_path)]assets/</span><br>
                    <div class="input-group">' .
                        view('manager::form.inputElement', [
                            'name' => 'rb_base_dir',
                            'value' => $settings['rb_base_dir'],
                            'attributes' => 'onchange="documentDirty=true;" maxlength="255"'
                        ]) .
                        '<div class="input-group-btn">' .
                            view('manager::form.inputElement', [
                                'type' => 'button',
                                'value' => ManagerTheme::getLexicon('reset'),
                                'attributes' => 'onclick="reset_path(\'rb_base_dir\');"'
                            ]) .
                        '</div>
                    </div>',
                'comment' => ManagerTheme::getLexicon('rb_base_dir_message')
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'rb_base_url',
                'label' => ManagerTheme::getLexicon('rb_base_url_title'),
                'small' => '[(rb_base_url)]',
                'value' => $settings['rb_base_url'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
                'comment' => (isset($disabledSettings['rb_base_url']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('rb_base_url_message'),
                'disabled' => $disabledSettings['rb_base_url'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'clean_uploaded_filename',
                'label' => ManagerTheme::getLexicon('clean_uploaded_filename'),
                'small' => '[(clean_uploaded_filename)]',
                'value' => $settings['clean_uploaded_filename'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['clean_uploaded_filename']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('clean_uploaded_filename_message'),
                'disabled' => $disabledSettings['clean_uploaded_filename'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'strip_image_paths',
                'label' => ManagerTheme::getLexicon('settings_strip_image_paths_title'),
                'small' => '[(strip_image_paths)]',
                'value' => $settings['strip_image_paths'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['strip_image_paths']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('settings_strip_image_paths_message'),
                'disabled' => $disabledSettings['strip_image_paths'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'maxImageWidth',
                'label' => ManagerTheme::getLexicon('maxImageWidth'),
                'small' => '[(maxImageWidth)]',
                'value' => $settings['maxImageWidth'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
                'comment' => (isset($disabledSettings['maxImageWidth']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('maxImageWidth_message'),
                'disabled' => $disabledSettings['maxImageWidth'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'maxImageHeight',
                'label' => ManagerTheme::getLexicon('maxImageHeight'),
                'small' => '[(maxImageHeight)]',
                'value' => $settings['maxImageHeight'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
                'comment' => (isset($disabledSettings['maxImageHeight']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('maxImageHeight_message'),
                'disabled' => $disabledSettings['maxImageHeight'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'clientResize',
                'label' => ManagerTheme::getLexicon('clientResize'),
                'small' => '[(clientResize)]',
                'value' => $settings['clientResize'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['clientResize']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('clientResize_message'),
                'disabled' => $disabledSettings['clientResize'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'noThumbnailsRecreation',
                'label' => ManagerTheme::getLexicon('noThumbnailsRecreation'),
                'small' => '[(noThumbnailsRecreation)]',
                'value' => $settings['noThumbnailsRecreation'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['noThumbnailsRecreation']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('noThumbnailsRecreation_message'),
                'disabled' => $disabledSettings['noThumbnailsRecreation'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'thumbWidth',
                'label' => ManagerTheme::getLexicon('thumbWidth'),
                'small' => '[(thumbWidth)]',
                'value' => $settings['thumbWidth'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
                'comment' => (isset($disabledSettings['thumbWidth']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('thumbWidth_message'),
                'disabled' => $disabledSettings['thumbWidth'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'thumbHeight',
                'label' => ManagerTheme::getLexicon('thumbHeight'),
                'small' => '[(thumbHeight)]',
                'value' => $settings['thumbHeight'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
                'comment' => (isset($disabledSettings['thumbHeight']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('thumbHeight_message'),
                'disabled' => $disabledSettings['thumbHeight'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'thumbsDir',
                'label' => ManagerTheme::getLexicon('thumbsDir'),
                'small' => '[(thumbsDir)]',
                'value' => $settings['thumbsDir'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
                'comment' => (isset($disabledSettings['thumbsDir']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('thumbsDir_message'),
                'disabled' => $disabledSettings['thumbsDir'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'jpegQuality',
                'label' => ManagerTheme::getLexicon('jpegQuality'),
                'small' => '[(jpegQuality)]',
                'value' => $settings['jpegQuality'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="4"',
                'comment' => (isset($disabledSettings['jpegQuality']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('jpegQuality_message'),
                'disabled' => $disabledSettings['jpegQuality'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'denyZipDownload',
                'label' => ManagerTheme::getLexicon('denyZipDownload'),
                'small' => '[(denyZipDownload)]',
                'value' => $settings['denyZipDownload'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['denyZipDownload']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['denyZipDownload'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'denyExtensionRename',
                'label' => ManagerTheme::getLexicon('denyExtensionRename'),
                'small' => '[(denyExtensionRename)]',
                'value' => $settings['denyExtensionRename'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['denyExtensionRename']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['denyExtensionRename'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'showHiddenFiles',
                'label' => ManagerTheme::getLexicon('showHiddenFiles'),
                'small' => '[(showHiddenFiles)]',
                'value' => $settings['showHiddenFiles'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['showHiddenFiles']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['showHiddenFiles'] ?? null
            ])

            <div class="split my-1"></div>
        </div>

        {!! get_by_key($tabEvents, 'OnMiscSettingsRender') !!}
    </div>
</div>
