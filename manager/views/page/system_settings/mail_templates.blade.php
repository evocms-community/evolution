<?php

use EvolutionCMS\Facades\ManagerTheme;

?><!-- User settings -->
<div class="tab-page" id="tabPage4">
    <h2 class="tab">{{ ManagerTheme::getLexicon('settings_email_templates') }}</h2>
    <script>tpSettings.addTabPage(document.getElementById('tabPage4'));</script>
    <div class="container container-body">

        @include('manager::form.input', [
            'name' => 'emailsender',
            'label' => ManagerTheme::getLexicon('emailsender_title'),
            'small' => '[(emailsender)]',
            'value' => $settings['emailsender'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['emailsender']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('emailsender_message'),
            'disabled' => $disabledSettings['emailsender'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'email_sender_method',
            'label' => ManagerTheme::getLexicon('email_sender_method'),
            'small' => '[(email_sender_method)]',
            'value' => $settings['email_sender_method'],
            'options' => [
                1 => ManagerTheme::getLexicon('auto'),
                0 => ManagerTheme::getLexicon('use_emailsender')
            ],
            'comment' => (isset($disabledSettings['email_sender_method']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('email_sender_method_message'),
            'disabled' => $disabledSettings['email_sender_method'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'email_method',
            'label' => ManagerTheme::getLexicon('email_method_title'),
            'small' => '[(email_method)]',
            'value' => $settings['email_method'],
            'options' => [
                'mail' => [
                    'text' => ManagerTheme::getLexicon('email_method_mail'),
                    'attributes' => 'id="useMail"'
                ],
                'smtp' => [
                    'text' => ManagerTheme::getLexicon('email_method_smtp'),
                    'attributes' => 'id="useSmtp"'
                ]
            ],
            'comment' => (isset($disabledSettings['email_method']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('email_sender_method_message'),
            'disabled' => $disabledSettings['email_method'] ?? null
        ])

        <div class="split my-1"></div>

        <div class="smtpRow" @if($settings['email_method'] == 'mail') style="display: none;" @endif>
            @include('manager::form.radio', [
                'name' => 'smtp_auth',
                'label' => ManagerTheme::getLexicon('smtp_auth_title'),
                'small' => '[(smtp_auth)]',
                'value' => $settings['smtp_auth'],
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['smtp_auth']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['smtp_auth'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.radio', [
                'name' => 'smtp_autotls',
                'label' => ManagerTheme::getLexicon('smtp_autotls_title'),
                'small' => '[(smtp_autotls)]',
                'value' => $settings['smtp_autotls'] ?? 0,
                'options' => [
                    1 => ManagerTheme::getLexicon('yes'),
                    0 => ManagerTheme::getLexicon('no')
                ],
                'comment' => (isset($disabledSettings['smtp_autotls']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['smtp_autotls'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.select', [
                'name' => 'smtp_secure',
                'label' => ManagerTheme::getLexicon('smtp_secure_title'),
                'small' => '[(smtp_secure)]',
                'value' => $settings['smtp_secure'],
                'attributes' => 'onChange="documentDirty=true;" size="1"',
                'options' => [
                    'none' => ManagerTheme::getLexicon('no'),
                    'ssl' => 'SSL',
                    'tls' => 'TLS',
                ],
                'comment' => (isset($disabledSettings['smtp_secure']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['smtp_secure'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'smtp_host',
                'label' => ManagerTheme::getLexicon('smtp_host_title'),
                'small' => '[(smtp_host)]',
                'value' => $settings['smtp_host'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
                'comment' => (isset($disabledSettings['smtp_host']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['smtp_host'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'smtp_port',
                'label' => ManagerTheme::getLexicon('smtp_port_title'),
                'small' => '[(smtp_port)]',
                'value' => $settings['smtp_port'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
                'comment' => (isset($disabledSettings['smtp_port']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['smtp_port'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'smtp_username',
                'label' => ManagerTheme::getLexicon('smtp_username_title'),
                'small' => '[(smtp_username)]',
                'value' => $settings['smtp_username'],
                'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
                'comment' => (isset($disabledSettings['smtp_username']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['smtp_username'] ?? null
            ])

            <div class="split my-1"></div>

            @include('manager::form.input', [
                'name' => 'smtppw',
                'label' => ManagerTheme::getLexicon('smtp_password_title'),
                'small' => '[(smtppw)]',
                'value' => '********************',
                'attributes' => 'onchange="documentDirty=true;" maxlength="255" autocomplete="off"',
                'comment' => (isset($disabledSettings['smtppw']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : ''),
                'disabled' => $disabledSettings['smtppw'] ?? null
            ])

            <div class="split my-1"></div>
        </div>

        @include('manager::form.input', [
            'name' => 'emailsubject',
            'id' => 'emailsubject_field',
            'for' => 'emailsubject_field',
            'label' => ManagerTheme::getLexicon('emailsubject_title') . '<br>' .
                ManagerTheme::getLexicon('update_settings_from_language') .
                view('manager::form.selectElement', [
                    'name' => 'reload_emailsubject',
                    'id' => 'reload_emailsubject_select',
                    'class' => 'form-control-sm',
                    'attributes' => 'onchange="confirmLangChange(this, \'emailsubject_default\', \'emailsubject_field\');"',
                    'first' => [
                        'text' => ManagerTheme::getLexicon('language_title')
                    ],
                    'options' => $langKeys,
                    'as' => 'values',
                    'ucwords' => true,
                    'disabled' => $disabledSettings['emailsubject'] ?? null
                ]) .
                view('manager::form.inputElement', [
                    'type' => 'hidden',
                    'name' => 'emailsubject_default',
                    'id' => 'emailsubject_default_hidden',
                    'value' => addslashes(ManagerTheme::getLexicon('emailsubject_default'))
                ])
            ,
            'small' => '[(emailsubject)]',
            'value' => $settings['emailsubject'],
            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
            'comment' => (isset($disabledSettings['emailsubject']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('emailsubject_message'),
            'disabled' => $disabledSettings['emailsubject'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.textarea', [
            'name' => 'websignupemail_message',
            'id' => 'websignupemail_message_textarea',
            'for' => 'websignupemail_message_textarea',
            'label' => ManagerTheme::getLexicon('websignupemail_title') . '<br>' .
                ManagerTheme::getLexicon('update_settings_from_language') .
                view('manager::form.selectElement', [
                    'name' => 'reload_websignupemail_message',
                    'id' => 'reload_websignupemail_message_select',
                    'class' => 'form-control-sm',
                    'attributes' => 'onchange="confirmLangChange(this, \'system_email_websignup\', \'websignupemail_message_textarea\');"',
                    'first' => [
                        'text' => ManagerTheme::getLexicon('language_title')
                    ],
                    'options' => $langKeys,
                    'as' => 'values',
                    'ucwords' => true,
                    'disabled' => $disabledSettings['websignupemail_message'] ?? null
                ]) .
                view('manager::form.inputElement', [
                    'type' => 'hidden',
                    'name' => 'system_email_websignup_default',
                    'id' => 'system_email_websignup_hidden',
                    'value' => addslashes(ManagerTheme::getLexicon('system_email_websignup'))
                ])
            ,
            'small' => '[(websignupemail_message)]',
            'value' => $settings['websignupemail_message'],
            'rows' => 5,
            'attributes' => 'onchange="documentDirty=true;"',
            'comment' => (isset($disabledSettings['websignupemail_message']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('websignupemail_message'),
            'disabled' => $disabledSettings['websignupemail_message'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.textarea', [
            'name' => 'webpwdreminder_message',
            'id' => 'system_email_webreminder_textarea',
            'for' => 'system_email_webreminder_textarea',
            'label' => ManagerTheme::getLexicon('webpwdreminder_title') . '<br>' .
                ManagerTheme::getLexicon('update_settings_from_language') .
                view('manager::form.selectElement', [
                    'name' => 'reload_system_email_webreminder_message',
                    'id' => 'reload_system_email_webreminder_select',
                    'class' => 'form-control-sm',
                    'attributes' => 'onchange="confirmLangChange(this, \'system_email_webreminder\', \'system_email_webreminder_textarea\');"',
                    'first' => [
                        'text' => ManagerTheme::getLexicon('language_title')
                    ],
                    'options' => $langKeys,
                    'as' => 'values',
                    'ucwords' => true,
                    'disabled' => $disabledSettings['webpwdreminder_message'] ?? null
                ]) .
                view('manager::form.inputElement', [
                    'type' => 'hidden',
                    'name' => 'system_email_webreminder_default',
                    'id' => 'system_email_webreminder_hidden',
                    'value' => addslashes(ManagerTheme::getLexicon('system_email_webreminder'))
                ])
            ,
            'small' => '[(webpwdreminder_message)]',
            'value' => $settings['webpwdreminder_message'],
            'rows' => 5,
            'attributes' => 'onchange="documentDirty=true;"',
            'comment' => (isset($disabledSettings['webpwdreminder_message']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('webpwdreminder_message'),
            'disabled' => $disabledSettings['webpwdreminder_message'] ?? null
        ])

        <div class="split my-1"></div>

        @include('manager::form.radio', [
            'name' => 'allow_multiple_emails',
            'label' => ManagerTheme::getLexicon('allow_multiple_emails_title'),
            'small' => '[(allow_multiple_emails)]',
            'value' => $settings['allow_multiple_emails'],
            'options' => [
                1 => ManagerTheme::getLexicon('yes'),
                0 => ManagerTheme::getLexicon('no')
            ],
            'comment' => (isset($disabledSettings['allow_multiple_emails']) ? ManagerTheme::getLexicon('setting_from_file') . '<br>' : '') .
                ManagerTheme::getLexicon('allow_multiple_emails_message'),
            'disabled' => $disabledSettings['allow_multiple_emails'] ?? null
        ])

        <div class="split my-1"></div>

        {!! get_by_key($tabEvents, 'OnUserSettingsRender') !!}
    </div>
</div>
