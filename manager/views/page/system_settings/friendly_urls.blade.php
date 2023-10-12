<?php

use EvolutionCMS\Facades\ManagerTheme;

?><!-- Friendly URL settings  -->
<div class="tab-page" id="tabPage3">
    <h2 class="tab">{{ ManagerTheme::getLexicon('settings_furls') }}</h2>
    <script>
      tpSettings.addTabPage(document.getElementById('tabPage3'))
    </script>
    <div class="container container-body">

        @include('manager::form.radio', [
            'name' => 'friendly_urls',
            'label' => ManagerTheme::getLexicon('friendlyurls_title'),
            'small' => '[(friendly_urls)]',
            'value' => $settings['friendly_urls'],
            'options' => [
                1 => [
                    'text' => ManagerTheme::getLexicon('yes'),
                    'attributes' => 'id="furlRowOn"',
                ],
                0 => [
                    'text' => ManagerTheme::getLexicon('no'),
                    'attributes' => 'id="furlRowOff"',
                ],
            ],
            'comment' =>
                (isset($disabledSettings['friendly_urls']) ? ManagerTheme::getLexicon('setting_from_file') . '<br />' : '') .
                ManagerTheme::getLexicon('friendlyurls_message'),
            'disabled' => $disabledSettings['friendly_urls'] ?? null,
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'xhtml_urls',
            'label' => ManagerTheme::getLexicon('xhtml_urls_title'),
            'small' => '[(xhtml_urls)]',
            'value' => $settings['xhtml_urls'],
            'options' => [
                1 => [
                    'text' => ManagerTheme::getLexicon('yes'),
                    'attributes' => 'id="furlRowOn"',
                ],
                0 => [
                    'text' => ManagerTheme::getLexicon('no'),
                    'attributes' => 'id="furlRowOff"',
                ],
            ],
            'comment' =>
                (isset($disabledSettings['xhtml_urls']) ? ManagerTheme::getLexicon('setting_from_file') . '<br />' : '') .
                ManagerTheme::getLexicon('xhtml_urls_message'),
            'disabled' => $disabledSettings['xhtml_urls'] ?? null,
        ])

        <div class="split my-1"></div>

        <div class="furlRow" @if (!$settings['friendly_urls']) style="display: none" @endif>

            @include('manager::form.input', [
                'name' => 'friendly_url_prefix',
                'label' => ManagerTheme::getLexicon('friendlyurlsprefix_title'),
                'small' => '[(friendly_url_prefix)]',
                'value' => $settings['friendly_url_prefix'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="50"',
                'comment' =>
                    (isset($disabledSettings['friendly_url_prefix'])
                        ? ManagerTheme::getLexicon('setting_from_file') . '<br />'
                        : '') . ManagerTheme::getLexicon('friendlyurlsprefix_message'),
                'disabled' => $disabledSettings['friendly_url_prefix'] ?? null,
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'friendly_url_suffix',
                'label' => ManagerTheme::getLexicon('friendlyurlsuffix_title'),
                'small' => '[(friendly_url_suffix)]',
                'value' => $settings['friendly_url_suffix'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="50"',
                'comment' =>
                    (isset($disabledSettings['friendly_url_suffix'])
                        ? ManagerTheme::getLexicon('setting_from_file') . '<br />'
                        : '') . ManagerTheme::getLexicon('friendlyurlsuffix_message'),
                'disabled' => $disabledSettings['friendly_url_suffix'] ?? null,
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'make_folders',
                'label' => ManagerTheme::getLexicon('make_folders_title'),
                'small' => '[(make_folders)]',
                'value' => $settings['make_folders'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no'),
                ],
                'comment' =>
                    (isset($disabledSettings['make_folders']) ? ManagerTheme::getLexicon('setting_from_file') . '<br />' : '') .
                    ManagerTheme::getLexicon('make_folders_message'),
                'disabled' => $disabledSettings['make_folders'] ?? null,
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'seostrict',
                'label' => ManagerTheme::getLexicon('seostrict_title'),
                'small' => '[(seostrict)]',
                'value' => $settings['seostrict'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no'),
                ],
                'comment' =>
                    (isset($disabledSettings['seostrict']) ? ManagerTheme::getLexicon('setting_from_file') . '<br />' : '') .
                    ManagerTheme::getLexicon('seostrict_message'),
                'disabled' => $disabledSettings['seostrict'] ?? null,
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'friendly_alias_urls',
                'label' => ManagerTheme::getLexicon('friendly_alias_title'),
                'small' => '[(friendly_alias_urls)]',
                'value' => $settings['friendly_alias_urls'],
                'options' => [
                    1 => [
                        'text' => ManagerTheme::getLexicon('yes'),
                        'attributes' => 'id="furlAliasPathRowOn"',
                    ],
                    0 => [
                        'text' => ManagerTheme::getLexicon('no'),
                        'attributes' => 'id="furlAliasPathRowOff"',
                    ],
                ],
                'comment' =>
                    (isset($disabledSettings['friendly_alias_urls'])
                        ? ManagerTheme::getLexicon('setting_from_file') . '<br />'
                        : '') . ManagerTheme::getLexicon('friendly_alias_message'),
                'disabled' => $disabledSettings['friendly_alias_urls'] ?? null,
            ])

            <div class="furlAliasPathRow" @if (!$settings['friendly_alias_urls']) style="display: none" @endif>
                <div class="split my-1"></div>

                @include('manager::form.radio', [
                    'name' => 'use_alias_path',
                    'label' => ManagerTheme::getLexicon('use_alias_path_title'),
                    'small' => '[(use_alias_path)]',
                    'value' => $settings['use_alias_path'],
                    'options' => [
                        1 => ManagerTheme::getLexicon('yes'),
                        0 => ManagerTheme::getLexicon('no'),
                    ],
                    'comment' =>
                        (isset($disabledSettings['use_alias_path'])
                            ? ManagerTheme::getLexicon('setting_from_file') . '<br />'
                            : '') . ManagerTheme::getLexicon('use_alias_path_message'),
                    'disabled' => $disabledSettings['use_alias_path'] ?? null,
                ])
            </div>

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'alias_listing',
                'label' => ManagerTheme::getLexicon('alias_listing_title'),
                'small' => '[(alias_listing)]',
                'value' => $settings['alias_listing'],
                'options' => [
                    1 => ManagerTheme::getLexicon('alias_listing_enabled'),
                    2 => ManagerTheme::getLexicon('alias_listing_folders'),
                    0 => ManagerTheme::getLexicon('alias_listing_disabled'),
                ],
                'comment' =>
                    (isset($disabledSettings['alias_listing']) ? ManagerTheme::getLexicon('setting_from_file') . '<br />' : '') .
                    ManagerTheme::getLexicon('alias_listing_message'),
                'disabled' => $disabledSettings['alias_listing'] ?? null,
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'allow_duplicate_alias',
                'label' => ManagerTheme::getLexicon('duplicate_alias_title'),
                'small' => '[(allow_duplicate_alias)]',
                'value' => $settings['allow_duplicate_alias'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no'),
                ],
                'comment' =>
                    (isset($disabledSettings['allow_duplicate_alias'])
                        ? ManagerTheme::getLexicon('setting_from_file') . '<br />'
                        : '') . ManagerTheme::getLexicon('duplicate_alias_message'),
                'disabled' => $disabledSettings['allow_duplicate_alias'] ?? null,
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'automatic_alias',
                'label' => ManagerTheme::getLexicon('automatic_alias_title'),
                'small' => '[(automatic_alias)]',
                'value' => $settings['automatic_alias'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no'),
                ],
                'comment' =>
                    (isset($disabledSettings['automatic_alias'])
                        ? ManagerTheme::getLexicon('setting_from_file') . '<br />'
                        : '') . ManagerTheme::getLexicon('automatic_alias_message'),
                'disabled' => $disabledSettings['automatic_alias'] ?? null,
            ])

            <div class="split my-1"></div>

            {!! get_by_key($tabEvents, 'OnFriendlyURLSettingsRender') !!}
        </div>
    </div>
</div>
