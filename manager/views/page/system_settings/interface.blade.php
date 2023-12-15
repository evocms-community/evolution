<?php

use EvolutionCMS\Facades\ManagerTheme;

?><!-- Interface & editor settings -->
<div class="tab-page" id="tabPage5">
    <h2 class="tab">{{ ManagerTheme::getLexicon('settings_ui') }}</h2>
    <script>
      tpSettings.addTabPage(document.getElementById('tabPage5'))
    </script>
    <div class="container container-body">

        @include('manager::form.select', [
            'name' => 'manager_language',
            'label' => ManagerTheme::getLexicon('language_title'),
            'small' => '[(manager_language)]',
            'value' => $settings['manager_language'],
            'options' => $langKeys,
            'as' => 'values',
            'ucwords' => false,
            'str_to_upper' => true,
            'attributes' => 'onChange="documentDirty=true;" size="1"',
            'comment' =>
                    (isset($disabledSettings['manager_language']) ? __('global.setting_from_file') . '<br>' : '') .
                    __('global.language_message'),
            'disabled' => $disabledSettings['manager_language'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.select', [
            'name' => 'modx_charset',
            'label' => ManagerTheme::getLexicon('charset_title'),
            'small' => '[(modx_charset)]',
            'value' => $settings['modx_charset'],
            'attributes' => 'onChange="documentDirty=true;" size="1"',
            'options' => include EVO_CORE_PATH . '/factory/charsets.php',
            'comment' =>
                (isset($disabledSettings['modx_charset']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('charset_message'),
            'disabled' => $disabledSettings['modx_charset'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.select', [
            'name' => 'manager_theme',
            'label' => ManagerTheme::getLexicon('manager_theme'),
            'small' => '[(manager_theme)]',
            'value' => $settings['manager_theme'],
            'attributes' =>
                'onChange="documentDirty=true; document.forms[\'settings\'].theme_refresher.value = Date.parse(new Date());" size="1"',
            'options' => $themes,
            'ucwords' => true,
            'comment' =>
                (isset($disabledSettings['manager_theme']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                '<input type="hidden" name="theme_refresher" value="" />',
            'disabled' => $disabledSettings['manager_theme'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'manager_theme_mode',
            'label' => ManagerTheme::getLexicon('manager_theme_mode'),
            'small' => '[(manager_theme_mode)]',
            'value' => $settings['manager_theme_mode'],
            'options' => [
                1 => ManagerTheme::getLexicon('manager_theme_mode1'),
                2 => ManagerTheme::getLexicon('manager_theme_mode2'),
                3 => ManagerTheme::getLexicon('manager_theme_mode3'),
                4 => ManagerTheme::getLexicon('manager_theme_mode4'),
            ],
            'comment' =>
                (isset($disabledSettings['manager_theme_mode']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('manager_theme_mode_message'),
            'disabled' => $disabledSettings['manager_theme_mode'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.row', [
            'label' => ManagerTheme::getLexicon('login_logo_title'),
            'small' => '[(login_logo)]',
            'for' => 'login_logo',
            'element' =>
                '
                                        <div class="col-md-8">
                                            <div class="input-group">' .
                view('manager::form.inputElement', [
                    'name' => 'login_logo',
                    'value' => $settings['login_logo'],
                    'attributes' => 'onChange="documentDirty=true;"',
                    'disabled' => $disabledSettings['login_logo'] ?? null,
                ]) .
                '<div class="input-group-btn">' .
                view('manager::form.inputElement', [
                    'type' => 'button',
                    'value' => ManagerTheme::getLexicon('insert'),
                    'attributes' => 'onclick="BrowseServer(\'login_logo\')"',
                    'disabled' => $disabledSettings['login_logo'] ?? null,
                ]) .
                '</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <img name="login_logo" style="max-height: 48px" src="' .
                ($settings['login_logo'] ? (preg_match('#^https?://#i', $settings['login_logo']) == false ? MODX_SITE_URL : '') . $settings['login_logo'] : '') . '" />
                                        </div>',
            'comment' =>
                (isset($disabledSettings['login_logo']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('login_logo_message'),
        ])

        <div class="split my-1"></div>

        @include('manager::form.row', [
            'label' => ManagerTheme::getLexicon('login_bg_title'),
            'small' => '[(login_bg)]',
            'for' => 'login_bg',
            'element' =>
                '
                                        <div class="col-md-8">
                                            <div class="input-group">' .
                view('manager::form.inputElement', [
                    'name' => 'login_bg',
                    'value' => $settings['login_bg'],
                    'attributes' => 'onChange="documentDirty=true;"',
                    'disabled' => $disabledSettings['login_bg'] ?? null,
                ]) .
                '<div class="input-group-btn">' .
                view('manager::form.inputElement', [
                    'type' => 'button',
                    'value' => ManagerTheme::getLexicon('insert'),
                    'attributes' => 'onclick="BrowseServer(\'login_bg\')"',
                    'disabled' => $disabledSettings['login_bg'] ?? null,
                ]) .
                '</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <img name="login_bg" style="max-height: 48px" src="' .
                ($settings['login_bg'] ? (preg_match('#^https?://#i', $settings['login_bg']) === false ? MODX_SITE_URL : '') . $settings['login_bg'] : '') . '" />
                                        </div>',
            'comment' =>
                (isset($disabledSettings['login_bg']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('login_bg_message'),
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'login_form_position',
            'label' => ManagerTheme::getLexicon('login_form_position_title'),
            'small' => '[(login_form_position)]',
            'value' => $settings['login_form_position'],
            'options' => [
                'left' => ManagerTheme::getLexicon('login_form_position_left'),
                'center' => ManagerTheme::getLexicon('login_form_position_center'),
                'right' => ManagerTheme::getLexicon('login_form_position_right'),
            ],
            'comment' => isset($disabledSettings['login_form_position'])
                ? ManagerTheme::getLexicon('setting_from_file') . '<br>'
                : '',
            'disabled' => $disabledSettings['login_form_position'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'login_form_style',
            'label' => ManagerTheme::getLexicon('login_form_style'),
            'small' => '[(login_form_style)]',
            'value' => $settings['login_form_style'],
            'options' => [
                'dark' => ManagerTheme::getLexicon('login_form_style_dark'),
                'light' => ManagerTheme::getLexicon('login_form_style_light'),
            ],
            'comment' => isset($disabledSettings['login_form_style'])
                ? ManagerTheme::getLexicon('setting_from_file') . '<br>'
                : '',
            'disabled' => $disabledSettings['login_form_style'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'manager_menu_position',
            'label' => ManagerTheme::getLexicon('manager_menu_position_title'),
            'small' => '[(manager_menu_position)]',
            'value' => $settings['manager_menu_position'],
            'options' => [
                'top' => ManagerTheme::getLexicon('manager_menu_position_top'),
                'left' => ManagerTheme::getLexicon('manager_menu_position_left'),
            ],
            'comment' => isset($disabledSettings['manager_menu_position'])
                ? ManagerTheme::getLexicon('setting_from_file') . '<br>'
                : '',
            'disabled' => $disabledSettings['manager_menu_position'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'show_picker',
            'label' => ManagerTheme::getLexicon('show_picker'),
            'small' => '[(show_picker)]',
            'value' => $settings['show_picker'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' =>
                (isset($disabledSettings['show_picker']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('settings_show_picker_message'),
            'disabled' => $disabledSettings['show_picker'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'warning_visibility',
            'label' => ManagerTheme::getLexicon('warning_visibility'),
            'small' => '[(warning_visibility)]',
            'value' => $settings['warning_visibility'],
            'options' => [
                0 => ManagerTheme::getLexicon('administrators'),
                1 => ManagerTheme::getLexicon('everybody'),
            ],
            'comment' =>
                (isset($disabledSettings['warning_visibility']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('warning_visibility_message'),
            'disabled' => $disabledSettings['warning_visibility'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'tree_page_click',
            'label' => ManagerTheme::getLexicon('tree_page_click'),
            'small' => '[(tree_page_click)]',
            'value' => $settings['tree_page_click'],
            'options' => [
                27 => ManagerTheme::getLexicon('edit_resource'),
                3 => ManagerTheme::getLexicon('doc_data_title'),
            ],
            'comment' =>
                (isset($disabledSettings['tree_page_click']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('tree_page_click_message'),
            'disabled' => $disabledSettings['tree_page_click'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'use_breadcrumbs',
            'label' => ManagerTheme::getLexicon('use_breadcrumbs'),
            'small' => '[(use_breadcrumbs)]',
            'value' => $settings['use_breadcrumbs'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' =>
                (isset($disabledSettings['use_breadcrumbs']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('use_breadcrumbs_message'),
            'disabled' => $disabledSettings['use_breadcrumbs'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'remember_last_tab',
            'label' => ManagerTheme::getLexicon('remember_last_tab'),
            'small' => '[(remember_last_tab)]',
            'value' => $settings['remember_last_tab'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' =>
                (isset($disabledSettings['remember_last_tab']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('remember_last_tab_message'),
            'disabled' => $disabledSettings['remember_last_tab'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'global_tabs',
            'label' => ManagerTheme::getLexicon('use_global_tabs'),
            'small' => '[(global_tabs)]',
            'value' => $settings['global_tabs'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' => isset($disabledSettings['global_tabs']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '',
            'disabled' => $disabledSettings['global_tabs'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.select', [
            'name' => 'group_tvs',
            'label' => ManagerTheme::getLexicon('group_tvs'),
            'small' => '[(group_tvs)]',
            'value' => $settings['group_tvs'],
            'options' => explode(',', ManagerTheme::getLexicon('settings_group_tv_options')),
            'attributes' => 'onChange="documentDirty=true;" size="1"',
            'comment' =>
                (isset($disabledSettings['group_tvs']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('settings_group_tv_message'),
            'disabled' => $disabledSettings['group_tvs'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'show_newresource_btn',
            'label' => ManagerTheme::getLexicon('show_newresource_btn'),
            'small' => '[(show_newresource_btn)]',
            'value' => $settings['show_newresource_btn'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' =>
                (isset($disabledSettings['show_newresource_btn'])
                    ? ManagerTheme::getLexicon('setting_from_file') . '<br>'
                    : '') . ManagerTheme::getLexicon('show_newresource_btn_message'),
            'disabled' => $disabledSettings['show_newresource_btn'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'show_fullscreen_btn',
            'label' => ManagerTheme::getLexicon('show_fullscreen_btn'),
            'small' => '[(show_fullscreen_btn)]',
            'value' => $settings['show_fullscreen_btn'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' =>
                (isset($disabledSettings['show_fullscreen_btn']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('show_fullscreen_btn_message'),
            'disabled' => $disabledSettings['show_fullscreen_btn'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.select', [
            'name' => 'resource_tree_node_name',
            'label' => ManagerTheme::getLexicon('setting_resource_tree_node_name'),
            'small' => '[(resource_tree_node_name)]',
            'value' => $settings['resource_tree_node_name'],
            'options' => [
                'pagetitle' => '[*pagetitle*]',
                'longtitle' => '[*longtitle*]',
                'menutitle' => '[*menutitle*]',
                'alias' => '[*alias*]',
                'createdon' => '[*createdon*]',
                'editedon' => '[*editedon*]',
                'publishedon' => '[*publishedon*]',
            ],
            'attributes' => 'onChange="documentDirty=true;" size="1"',
            'comment' =>
                (isset($disabledSettings['resource_tree_node_name'])
                    ? ManagerTheme::getLexicon('setting_from_file') . '<br>'
                    : '') .
                ManagerTheme::getLexicon('setting_resource_tree_node_name_desc') .
                '<br /><b>' .
                ManagerTheme::getLexicon('setting_resource_tree_node_name_desc_add') .
                '</b>',
            'disabled' => $disabledSettings['resource_tree_node_name'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'session_timeout',
            'label' => ManagerTheme::getLexicon('session_timeout'),
            'small' => '[(session_timeout)]',
            'value' => $settings['session_timeout'],
            'comment' =>
                (isset($disabledSettings['session_timeout']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('session_timeout_msg'),
            'disabled' => $disabledSettings['session_timeout'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'tree_show_protected',
            'label' => ManagerTheme::getLexicon('tree_show_protected'),
            'small' => '[(tree_show_protected)]',
            'value' => $settings['tree_show_protected'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' =>
                (isset($disabledSettings['tree_show_protected']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('tree_show_protected_message'),
            'disabled' => $disabledSettings['tree_show_protected'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'datepicker_offset',
            'label' => ManagerTheme::getLexicon('datepicker_offset'),
            'small' => '[(datepicker_offset)]',
            'value' => $settings['datepicker_offset'],
            'attributes' => 'onChange="documentDirty=true;" maxlength="50"',
            'comment' =>
                (isset($disabledSettings['datepicker_offset']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('datepicker_offset_message'),
            'disabled' => $disabledSettings['datepicker_offset'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.select', [
            'name' => 'datetime_format',
            'label' => ManagerTheme::getLexicon('datetime_format'),
            'small' => '[(datetime_format)]',
            'value' => $settings['datetime_format'],
            'attributes' => 'onChange="documentDirty=true;" size="1"',
            'options' => ['dd-mm-YYYY', 'mm/dd/YYYY', 'YYYY/mm/dd'],
            'as' => 'values',
            'comment' =>
                (isset($disabledSettings['datetime_format']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('datetime_format_message'),
            'disabled' => $disabledSettings['datetime_format'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'number_of_logs',
            'label' => ManagerTheme::getLexicon('nologentries_title'),
            'small' => '[(number_of_logs)]',
            'value' => $settings['number_of_logs'],
            'attributes' => 'onChange="documentDirty=true;" maxlength="50"',
            'comment' =>
                (isset($disabledSettings['number_of_logs']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('nologentries_message'),
            'disabled' => $disabledSettings['number_of_logs'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'number_of_results',
            'label' => ManagerTheme::getLexicon('noresults_title'),
            'small' => '[(number_of_results)]',
            'value' => $settings['number_of_results'],
            'attributes' => 'onChange="documentDirty=true;" maxlength="50"',
            'comment' =>
                (isset($disabledSettings['number_of_results']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('noresults_message'),
            'disabled' => $disabledSettings['number_of_results'] ?? null,
        ])

        <div class="split my-1"></div>

        <?php
        // invoke OnRichTextEditorRegister event
        $evtOut = evo()->invokeEvent('OnRichTextEditorRegister');
        if (!is_array($evtOut)) {
            $evtOut = [];
            $use_editor = 0;
        }
        ?>

        <div @if (empty($evtOut)) style="display: none;" @endif>

            @include('manager::form.radio', [
                'name' => 'use_editor',
                'label' => ManagerTheme::getLexicon('use_editor_title'),
                'small' => '[(use_editor)]',
                'value' => $settings['use_editor'],
                'options' => [
                    1 => [
                        'text' => ManagerTheme::getLexicon('yes'),
                        'attributes' => 'id="editorRowOn"',
                    ],
                    0 => [
                        'text' => ManagerTheme::getLexicon('no'),
                        'attributes' => 'id="editorRowOff"',
                    ],
                ],
                'comment' =>
                    (isset($disabledSettings['use_editor']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                    ManagerTheme::getLexicon('use_editor_message'),
                'disabled' => $disabledSettings['use_editor'] ?? null,
            ])

            <div class="split my-1"></div>

            <div class="editorRow" @if (empty($settings['use_editor'])) style="display: none;" @endif>

                @include('manager::form.select', [
                    'name' => 'which_editor',
                    'label' => ManagerTheme::getLexicon('which_editor_title'),
                    'small' => '[(which_editor)]',
                    'value' => $settings['which_editor'],
                    'attributes' => 'onChange="documentDirty=true;" size="1"',
                    'first' => [
                        'value' => 'none',
                        'text' => ManagerTheme::getLexicon('none'),
                    ],
                    'options' => $evtOut,
                    'as' => 'values',
                    'comment' =>
                        (isset($disabledSettings['which_editor'])
                            ? ManagerTheme::getLexicon('setting_from_file') . '<br>'
                            : '') . ManagerTheme::getLexicon('which_editor_message'),
                    'disabled' => $disabledSettings['which_editor'] ?? null,
                ])

                <div class="split my-1"></div>

                @include('manager::form.select', [
                    'name' => 'fe_editor_lang',
                    'label' => ManagerTheme::getLexicon('fe_editor_lang_title'),
                    'small' => '[(fe_editor_lang)]',
                    'value' => $settings['fe_editor_lang'],
                    'attributes' => 'onChange="documentDirty=true;" size="1"',
                    'first' => [
                        'text' => ManagerTheme::getLexicon('language_title'),
                    ],
                    'options' => $langKeys,
                    'as' => 'values',
                    'ucwords' => true,
                    'comment' =>
                        (isset($disabledSettings['fe_editor_lang'])
                            ? ManagerTheme::getLexicon('setting_from_file') . '<br>'
                            : '') . ManagerTheme::getLexicon('fe_editor_lang_message'),
                    'disabled' => $disabledSettings['fe_editor_lang'] ?? null,
                ])

                <div class="split my-1"></div>

                @include('manager::form.input', [
                    'name' => 'editor_css_path',
                    'label' => ManagerTheme::getLexicon('editor_css_path_title'),
                    'small' => '[(editor_css_path)]',
                    'value' => $settings['editor_css_path'],
                    'attributes' => 'onChange="documentDirty=true;" maxlength="255"',
                    'comment' =>
                        (isset($disabledSettings['editor_css_path'])
                            ? ManagerTheme::getLexicon('setting_from_file') . '<br>'
                            : '') . ManagerTheme::getLexicon('editor_css_path_message'),
                    'disabled' => $disabledSettings['editor_css_path'] ?? null,
                ])

                <div class="split my-1"></div>
            </div>
        </div>

        {!! get_by_key($tabEvents, 'OnInterfaceSettingsRender') !!}
    </div>
</div>
