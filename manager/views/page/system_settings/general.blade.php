<?php

use EvolutionCMS\Facades\ManagerTheme;

?><!-- Site Settings -->
<div class="tab-page" id="tabPage2">
    <h2 class="tab">{{ ManagerTheme::getLexicon('settings_site') }}</h2>
    <script>tpSettings.addTabPage(document.getElementById('tabPage2'))</script>
    <div class="container container-body">
        @include('manager::form.radio', [
            'name' => 'site_status',
            'label' => ManagerTheme::getLexicon('sitestatus_title'),
            'small' => '[(site_status)]',
            'value' => $settings['site_status'],
            'options' => [
                1 =>  ManagerTheme::getLexicon('online'),
                0 => ManagerTheme::getLexicon('offline'),
            ],
            'comment' => (isset($disabledSettings['site_status']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['site_status'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'site_name',
            'label' => ManagerTheme::getLexicon('sitename_title'),
            'small' => '[(site_name)]',
            'value' => $settings['site_name'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['site_name']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('sitename_message'),
            'disabled' => $disabledSettings['site_name'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'site_start',
            'label' => ManagerTheme::getLexicon('sitestart_title'),
            'small' => '[(site_start)]',
            'value' => $settings['site_start'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['site_start']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('sitestart_message'),
            'disabled' => $disabledSettings['site_start'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'error_page',
            'label' => ManagerTheme::getLexicon('errorpage_title'),
            'small' => '[(error_page)]',
            'value' => $settings['error_page'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="10"',
            'comment' => (isset($disabledSettings['error_page']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('errorpage_message'),
            'disabled' => $disabledSettings['error_page'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'unauthorized_page',
            'label' => ManagerTheme::getLexicon('unauthorizedpage_title'),
            'small' => '[(unauthorized_page)]',
            'value' => $settings['unauthorized_page'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="10"',
            'comment' => (isset($disabledSettings['unauthorized_page']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('unauthorizedpage_message'),
            'disabled' => $disabledSettings['unauthorized_page'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'ControllerNamespace',
            'label' => ManagerTheme::getLexicon('controller_namespace'),
            'small' => '[(ControllerNamespace)]',
            'value' => (isset($settings['ControllerNamespace']))? $settings['ControllerNamespace'] : '',
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['ControllerNamespace']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('controller_namespace_message'),
            'disabled' => $disabledSettings['ControllerNamespace'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'UpgradeRepository',
            'label' => ManagerTheme::getLexicon('update_repository'),
            'small' => '[(UpgradeRepository)]',
            'value' => (isset($settings['UpgradeRepository']))? $settings['UpgradeRepository'] : '',
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['UpgradeRepository']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('update_repository_message'),
            'disabled' => $disabledSettings['UpgradeRepository'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'site_unavailable_page',
            'label' => ManagerTheme::getLexicon('siteunavailable_page_title'),
            'small' => '[(site_unavailable_page)]',
            'value' => $settings['site_unavailable_page'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="10"',
            'comment' => (isset($disabledSettings['site_unavailable_page']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('siteunavailable_page_message'),
            'disabled' => $disabledSettings['site_unavailable_page'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.textarea', [
            'name' => 'site_unavailable_message',
            'id' => 'site_unavailable_message_textarea',
            'for' => 'site_unavailable_message_textarea',
            'label' => ManagerTheme::getLexicon('siteunavailable_title') . '<br>' .
                ManagerTheme::getLexicon('update_settings_from_language') .
                view('manager::form.selectElement', [
                    'name' => 'reload_site_unavailable',
                    'id' => 'reload_site_unavailable_select',
                    'class' => 'form-control-sm',
                    'attributes' => 'onchange="confirmLangChange(this, \'siteunavailable_message_default\', \'site_unavailable_message_textarea\');"',
                    'first' => [
                        'text' => ManagerTheme::getLexicon('language_title')
                    ],
                    'options' => $langKeys,
                    'as' => 'values',
                    'ucwords' => true,
                    'disabled' => $disabledSettings['site_unavailable_message'] ?? null
                ]) .
                view('manager::form.inputElement', [
                    'type' => 'hidden',
                    'name' => 'siteunavailable_message_default',
                    'id' => 'siteunavailable_message_default_hidden',
                    'value' => $settings['manager_language']
                ])
            ,
            'small' => '[(site_unavailable_message)]',
            'value' => ($settings['site_unavailable_message'] ? $settings['site_unavailable_message'] : ManagerTheme::getLexicon('siteunavailable_message_default')),
            'attributes' => 'onchange="documentDirty=true;"',
            'rows' => 4,
            'comment' => (isset($disabledSettings['site_unavailable_message']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('siteunavailable_message'),
            'disabled' => $disabledSettings['site_unavailable_message'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.row', [
            'name' => 'default_template',
            'label' => ManagerTheme::getLexicon('defaulttemplate_title'),
            'small' => '[(default_template)]',
            'element' => view('manager::form.selectElement', [
                'name' => 'default_template',
                'value' => $settings['default_template'],
                'options' => $templates['items'],
                'attributes' => 'onchange="documentDirty=true;wrap=document.getElementById(\'template_reset_options_wrapper\');if(this.options[this.selectedIndex].value!=' . $settings['default_template'] . '){wrap.style.display=\'block\';}else{wrap.style.display=\'none\';}" size="1"',
                'comment' => (isset($disabledSettings['default_template']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['default_template'] ?? null
                ]) .
                '<div id="template_reset_options_wrapper" style="display:none;">' .
                    view('manager::form.radio', [
                        'name' => 'reset_template',
                        'options' => [
                            1 => ManagerTheme::getLexicon('template_reset_all'),
                            2 => sprintf(ManagerTheme::getLexicon('template_reset_specific'), $templates['oldTmpName'])
                        ]
                    ]) .
                '</div>' .
                view('manager::form.inputElement', [
                    'type' => 'hidden',
                    'name' => 'old_template',
                    'value' => $templates['oldTmpId']
                ]),
            'comment' => ManagerTheme::getLexicon('defaulttemplate_message')
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'auto_template_logic',
            'label' => ManagerTheme::getLexicon('defaulttemplate_logic_title'),
            'small' => '[(auto_template_logic)]',
            'value' => $settings['auto_template_logic'],
            'options' => [
                'system' => ManagerTheme::getLexicon('defaulttemplate_logic_system_message'),
                'parent' => ManagerTheme::getLexicon('defaulttemplate_logic_parent_message'),
                'sibling' => ManagerTheme::getLexicon('defaulttemplate_logic_sibling_message')
            ],
            'comment' => (isset($disabledSettings['auto_template_logic']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['auto_template_logic'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'chunk_processor',
            'label' => ManagerTheme::getLexicon('chunk_processor'),
            'small' => '[(chunk_processor)]',
            'value' => $settings['chunk_processor'],
            'options' => [
                '' => 'DocumentParser',
                'DLTemplate' => 'DLTemplate'
            ],
            'comment' => (isset($disabledSettings['chunk_processor']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['chunk_processor'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'enable_filter',
            'label' => ManagerTheme::getLexicon('enable_filter_title'),
            'small' => '[(enable_filter)]',
            'value' => $settings['enable_filter'],
            'options' => [
                1 => [
                    'text' => ManagerTheme::getLexicon('yes'),
                    'disabled' => $phxEnabled
                ],
                0 => [
                    'text' => ManagerTheme::getLexicon('no'),
                    'disabled' => $phxEnabled
                ]
            ],
            'comment' => (isset($disabledSettings['enable_filter']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('enable_filter_message'),
            'disabled' => $disabledSettings['enable_filter'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'enable_at_syntax',
            'label' => ManagerTheme::getLexicon('enable_at_syntax_title'),
            'small' => '[(enable_at_syntax)]',
            'value' => $settings['enable_at_syntax'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no')
            ],
            'comment' => (isset($disabledSettings['enable_at_syntax']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('enable_at_syntax_message') .
                '<ul>
                    <li><a href="https://github.com/modxcms/evolution/wiki/@@IF-@@ELSEIF-@@ELSE-@@ENDIF" target="_blank">@@IF @@ELSEIF @@ELSE @@ENDIF</a></li>
                    <li>&lt;@LITERAL&gt; @{{string}} [*string*] [[string]] &lt;@ENDLITERAL&gt;</li>
                    <li><!--@- Do not output -@--></li>
                </ul>',
            'disabled' => $disabledSettings['enable_at_syntax'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'publish_default',
            'label' => ManagerTheme::getLexicon('defaultpublish_title'),
            'small' => '[(publish_default)]',
            'value' => $settings['publish_default'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no')
            ],
            'comment' => (isset($disabledSettings['publish_default']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('defaultpublish_message'),
            'disabled' => $disabledSettings['publish_default'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'cache_default',
            'label' => ManagerTheme::getLexicon('defaultcache_title'),
            'small' => '[(cache_default)]',
            'value' => $settings['cache_default'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no')
            ],
            'comment' => (isset($disabledSettings['cache_default']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('defaultcache_message'),
            'disabled' => $disabledSettings['cache_default'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'search_default',
            'label' => ManagerTheme::getLexicon('defaultsearch_title'),
            'small' => '[(search_default)]',
            'value' => $settings['search_default'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no')
            ],
            'comment' => (isset($disabledSettings['search_default']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('defaultsearch_message'),
            'disabled' => $disabledSettings['search_default'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'auto_menuindex',
            'label' => ManagerTheme::getLexicon('defaultmenuindex_title'),
            'small' => '[(auto_menuindex)]',
            'value' => $settings['auto_menuindex'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no')
            ],
            'comment' => (isset($disabledSettings['auto_menuindex']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('defaultmenuindex_message'),
            'disabled' => $disabledSettings['auto_menuindex'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.row', [
            'label' => ManagerTheme::getLexicon('custom_contenttype_title'),
            'for' => 'txt_custom_contenttype',
            'element' => '
                <div class="input-group">' .
                    view('manager::form.inputElement', [
                        'name' => 'txt_custom_contenttype',
                        'attributes' => 'onChange="documentDirty=true;" maxlength="100"'
                    ]) .
                    '<div class="input-group-btn">' .
                        view('manager::form.inputElement', [
                            'type' => 'button',
                            'value' => ManagerTheme::getLexicon('add'),
                            'attributes' => 'onclick="addContentType();"'
                        ]) .
                    '</div>
                </div>
                <div class="col-auto col-sm-4 mt-1">' .
                    view('manager::form.selectElement', [
                        'name' => 'lst_custom_contenttype',
                        'attributes' => 'size="5"',
                        'options' => explode(',', $settings['custom_contenttype']),
                        'as' => 'values'
                    ]) .
                '</div>
                <div class="col-auto col-sm-2 mt-1">' .
                    view('manager::form.inputElement', [
                        'type' => 'button',
                        'name' => 'removecontenttype',
                        'value' => ManagerTheme::getLexicon('remove'),
                        'attributes' => 'onclick="removeContentType()"'
                    ]) .
                '</div>' .
                view('manager::form.inputElement', [
                    'type' => 'hidden',
                    'name' => 'custom_contenttype',
                    'value' => $settings['custom_contenttype']
                ]),
            'comment' => ManagerTheme::getLexicon('custom_contenttype_message')
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'enable_cache',
            'label' => ManagerTheme::getLexicon('enable_cache_title'),
            'small' => '[(enable_cache)]',
            'value' => $settings['enable_cache'],
            'options' => [
                1 => ManagerTheme::getLexicon('enabled'),
                0 => ManagerTheme::getLexicon('disabled'),
                2 => ManagerTheme::getLexicon('disabled_at_login')
            ],
            'comment' => (isset($disabledSettings['enable_cache']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['enable_cache'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'disable_chunk_cache',
            'label' => ManagerTheme::getLexicon('disable_chunk_cache_title'),
            'small' => '[(disable_chunk_cache)]',
            'value' => $settings['disable_chunk_cache'] ?? 0,
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' => (isset($disabledSettings['disable_chunk_cache']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['disable_chunk_cache'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'disable_snippet_cache',
            'label' => ManagerTheme::getLexicon('disable_snippet_cache_title'),
            'small' => '[(disable_snippet_cache)]',
            'value' => $settings['disable_snippet_cache'] ?? 0,
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' => (isset($disabledSettings['disable_snippet_cache']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['disable_snippet_cache'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'disable_plugins_cache',
            'label' => ManagerTheme::getLexicon('disable_plugins_cache_title'),
            'small' => '[(disable_plugins_cache)]',
            'value' => $settings['disable_plugins_cache'] ?? 0,
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no'),
            ],
            'comment' => (isset($disabledSettings['disable_plugins_cache']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['disable_plugins_cache'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'cache_type',
            'label' => ManagerTheme::getLexicon('cache_type_title'),
            'small' => '[(cache_type)]',
            'value' => $settings['cache_type'],
            'options' => [
                1 => ManagerTheme::getLexicon('cache_type_1'),
                2 => ManagerTheme::getLexicon('cache_type_2')
            ],
            'comment' => (isset($disabledSettings['cache_type']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['cache_type'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'minifyphp_incache',
            'label' => ManagerTheme::getLexicon('minifyphp_incache_title'),
            'small' => '[(minifyphp_incache)]',
            'value' => $settings['minifyphp_incache'],
            'options' => [
                1 => ManagerTheme::getLexicon('enabled'),
                0 => ManagerTheme::getLexicon('disabled')
            ],
            'comment' => (isset($disabledSettings['minifyphp_incache']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('minifyphp_incache_message'),
            'disabled' => $disabledSettings['minifyphp_incache'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.select', [
            'name' => 'server_offset_time',
            'label' => ManagerTheme::getLexicon('serveroffset_title'),
            'small' => '[(server_offset_time)]',
            'value' => $settings['server_offset_time'],
            'options' => $serverTimes,
            'attributes' => 'onChange="documentDirty=true;" size="1"',
            'comment' => (isset($disabledSettings['server_offset_time']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                sprintf(ManagerTheme::getLexicon('serveroffset_message'), evo()->toDateFormat(time(), 'timeOnly'), evo()->toDateFormat(time() + $settings['server_offset_time'], 'timeOnly')),
            'disabled' => $disabledSettings['server_offset_time'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'server_protocol',
            'label' => ManagerTheme::getLexicon('server_protocol_title'),
            'small' => '[(server_protocol)]',
            'value' => $settings['server_protocol'],
            'options' => [
                'http' => ManagerTheme::getLexicon('server_protocol_http'),
                'https' => ManagerTheme::getLexicon('server_protocol_https')
            ],
            'comment' => (isset($disabledSettings['server_protocol']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('server_protocol_message'),
            'disabled' => $disabledSettings['server_protocol'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.input', [
            'name' => 'rss_url_news',
            'label' => ManagerTheme::getLexicon('rss_url_news_title'),
            'small' => '[(rss_url_news)]',
            'value' => $settings['rss_url_news'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="350"',
            'comment' => (isset($disabledSettings['rss_url_news']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
            'disabled' => $disabledSettings['rss_url_news'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'track_visitors',
            'label' => ManagerTheme::getLexicon('track_visitors_title'),
            'small' => '[(track_visitors)]',
            'value' => $settings['track_visitors'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no')
            ],
            'comment' => (isset($disabledSettings['track_visitors']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('track_visitors_message'),
            'disabled' => $disabledSettings['track_visitors'] ?? null
        ])

        <div class="split my-1"></div>

        {!! get_by_key($tabEvents, 'OnSiteSettingsRender') !!}
    </div>
</div>
