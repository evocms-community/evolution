<?php

use EvolutionCMS\Facades\ManagerTheme;

?>
@extends('manager::template.page')
@section('content')
    @push('scripts.top')
        <script>
          // Added for RTE selection
          function changeRTE()
          {
            var whichEditor = document.getElementById('which_editor');
            if (whichEditor) {
              for (var i = 0; i < whichEditor.length; i++) {
                if (whichEditor[i].selected) {
                  newEditor = whichEditor[i].value;
                  break;
                }
              }
            }

            documentDirty = false;
            document.mutate.a.value = '{{ $action }}';
            document.mutate.which_editor.value = newEditor;
            document.mutate.submit();
          }

          var actions = {
            save: function() {
              documentDirty = false;
              form_save = true;
              document.mutate.save.click();
            },
            duplicate: function() {
              if (confirm(`{{ __('global.confirm_duplicate_record') }}`) === true) {
                documentDirty = false;
                document.location.href = "index.php?id={{ $data->getKey() }}&a=97";
              }
            },
            delete: function() {
              if (confirm(`{{ __('global.confirm_delete_htmlsnippet') }}`) === true) {
                documentDirty = false;
                document.location.href = 'index.php?id=' + document.mutate.id.value + '&a=80';
              }
            },
            cancel: function() {
              documentDirty = false;
              document.location.href = 'index.php?a=76&tab=2';
            }
          };

          document.addEventListener('DOMContentLoaded', function() {
            var h1help = document.querySelector('h1 > .help');
            h1help.onclick = function() {
              document.querySelector('.element-edit-message').classList.toggle('show');
            };
          });

        </script>
    @endpush

    <form class="htmlsnippet" id="mutate" name="mutate" method="post" action="index.php">
        @csrf
        {!! get_by_key($events, 'OnChunkFormPrerender') !!}

        <input type="hidden" name="a" value="79" />
        <input type="hidden" name="id" value="{{ $data->getKey() }}" />
        <input type="hidden" name="mode" value="{{ $action }}" />

        <h1>
            <i class="{{ ManagerTheme::getStyle('icon_chunk') }}"></i>
            @if($data->name)
                {{ $data->name }}
                <small>({{ $data->getKey() }})</small>
            @else
                {{ __('global.new_htmlsnippet') }}
            @endif
            <i class="{{ ManagerTheme::getStyle('icon_question_circle') }} help"></i>
        </h1>

        @include('manager::partials.actionButtons', $actionButtons)

        <div class="container element-edit-message">
            <div class="alert alert-info">{!! __('global.htmlsnippet_msg') !!}</div>
        </div>

        <div class="tab-pane" id="chunkPane">
            <script>
              var tpChunk = new WebFXTabPane(document.getElementById('chunkPane'), false);
            </script>

            <div class="tab-page" id="tabGeneral">
                <h2 class="tab">{{ __('global.settings_general') }}</h2>
                <script>tpChunk.addTabPage(document.getElementById('tabGeneral'));</script>

                <div class="container container-body">
                    @include('manager::form.row', [
                        'for' => 'name',
                        'label' => __('global.htmlsnippet_name'),
                        'element' => '<div class="form-control-name clearfix">' .
                            view('manager::form.inputElement', [
                                'name' => 'name',
                                'value' => $data->name,
                                'class' => 'form-control-lg',
                                'attributes' => 'onchange="documentDirty=true;" maxlength="100"'
                            ]) .
                            (evo()->hasPermission('save_role')
                            ? '<label class="custom-control" data-tooltip="' . __('global.lock_htmlsnippet') . "\n" . __('global.lock_htmlsnippet_msg') .'">' .
                            view('manager::form.inputElement', [
                                'type' => 'checkbox',
                                'name' => 'locked',
                                'checked' => ($data->locked == 1)
                            ]) .
                            '<i class="' . ManagerTheme::getStyle('icon_lock') . '"></i>
                            </label>
                            <small class="form-text text-danger hide" id="savingMessage"></small>
                            <script>if (!document.getElementsByName(\'name\')[0].value) document.getElementsByName(\'name\')[0].focus();</script>'
                            : '') .
                            '</div>'
                    ])

                    @include('manager::form.input', [
                        'name' => 'description',
                        'id' => 'description',
                        'label' => __('global.htmlsnippet_desc'),
                        'value' => $data->description,
                        'attributes' => 'onchange="documentDirty=true;" maxlength="255"'
                    ])

                    @include('manager::form.select', [
                        'name' => 'categoryid',
                        'id' => 'categoryid',
                        'label' => __('global.existing_category'),
                        'value' => $data->category,
                        'first' => [
                            'text' => ''
                        ],
                        'options' => $categories->pluck('category', 'id'),
                        'attributes' => 'onchange="documentDirty=true;"'
                    ])

                    @include('manager::form.input', [
                        'name' => 'newcategory',
                        'id' => 'newcategory',
                        'label' => __('global.new_category'),
                        'value' => (isset($data->newcategory) ? $data->newcategory : ''),
                        'attributes' => 'onchange="documentDirty=true;" maxlength="45"'
                    ])

                    <div class="form-row">
                        <label for="disabled">
                            @include('manager::form.inputElement', [
                                'type' => 'checkbox',
                                'name' => 'disabled',
                                'value' => 'on',
                                'checked' => ($data->disabled === 1)
                            ])
                            @if($data->disabled == 1)
                                <span class="text-danger">{{ __('global.disabled') }}</span>
                            @else
                                {{ __('global.disabled') }}
                            @endif
                        </label>
                    </div>
                </div>

                <!-- HTML text editor start -->
                <div class="navbar navbar-editor">
                    <span>{{ __('global.chunk_code') }}</span>
                    @if(get_by_key(evo()->config, 'use_editor') == 1)
                        <span class="float-right">
                            {{ __('global.which_editor_title') }}
                            @include('manager::form.selectElement', [
                                'name' => 'which_editor',
                                'value' => $which_editor,
                                'first' => [
                                    'value' => 'none',
                                    'text' => __('global.none')
                                ],
                                'options' => get_by_key($events, 'OnRichTextEditorRegister'),
                                'as' => 'values',
                                'class' => 'form-control-sm',
                                'attributes' => 'onchange="changeRTE();"'
                            ])
                        </span>
                    @endif
                </div>
                <div class="section-editor clearfix">
                    @include('manager::form.textareaElement', [
                        'name' => 'post',
                        'value' => (isset($data->post) ? $data->post : $data->snippet),
                        'class' => 'phptextarea',
                        'rows' => 20,
                        'attributes' => 'onChange="documentDirty=true;"'
                    ])
                </div>
                <!-- HTML text editor end -->

            </div>

            {!! get_by_key($events, 'OnChunkFormRender') !!}
        </div>
        <input type="submit" name="save" style="display:none;" />
    </form>

    @if(get_by_key(evo()->config, 'use_editor') == 1)
        {!! get_by_key($events, 'OnRichTextEditorInit') !!}
    @endif
@endsection
