@extends('manager::template.page')
@section('content')
    <?php
    /** @var EvolutionCMS\Models\SiteTemplate $data */ ?>
    @push('scripts.top')
        <script>
          var actions = {
            save: function () {
              documentDirty = false
              form_save = true
              document.mutate.save.click()
              //saveWait('mutate');
            },
            duplicate: function () {
              if (confirm("{{ __('global.confirm_duplicate_record') }}") === true) {
                documentDirty = false
                document.location.href = "index.php?id={{ $data->getKey() }}&a=96"
              }
            },
            delete: function () {
              if (confirm("{{ __('global.confirm_delete_template') }}") === true) {
                documentDirty = false
                document.location.href = 'index.php?id={{ $data->getKey() }}&a=21'
              }
            },
            cancel: function () {
              documentDirty = false
              document.location.href = 'index.php?a=76&tab=0'
            }
          }

          document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('h1 > .help').onclick = function () {
              document.querySelector('.element-edit-message').classList.toggle('show')
            }
          })

        </script>
    @endpush

    <form name="mutate" method="post" action="index.php">
        @csrf
        {!! get_by_key($events, 'OnTempFormPrerender') !!}

        <input type="hidden" name="a" value="20">
        <input type="hidden" name="id" value="{{ $data->getKey() }}">
        <input type="hidden" name="mode" value="{{ $action }}">

        <h1>
            <i class="{{ $_style['icon_template'] }}"></i>
            @if($data->templatename)
                {{ $data->templatename }}<small>({{ $data->getKey() }})</small>
            @else
                {{ __('global.new_template') }}
            @endif
            <i class="{{ $_style['icon_question_circle'] }} help"></i>
        </h1>

        @include('manager::partials.actionButtons', $actionButtons)

        <div class="container element-edit-message">
            <div class="alert alert-info">{{ __('global.template_msg') }}</div>
        </div>

        <div class="tab-pane" id="templatesPane">
            <script>
              const tp = new WebFXTabPane(document.getElementById('templatesPane'),
                      {{ get_by_key($modx->config, 'remember_last_tab') ? 1 : 0 }})
            </script>

            <div class="tab-page" id="tabTemplate">
                <h2 class="tab">{{ __('global.template_edit_tab') }}</h2>
                <script>tp.addTabPage(document.getElementById('tabTemplate'))</script>

                <div class="container container-body">
                    <div class="form-group">
                        @include('manager::form.row', [
                            'for' => 'templatename',
                            'label' => __('global.template_name'),
                            'small' => ($data->getKey() == get_by_key($modx->config, 'default_template') ? '<b class="text-danger">' . Str::lower(rtrim(__('global.defaulttemplate_title'), ':')) . '</b>' : ''),
                            'element' => '<div class="form-control-name clearfix">' .
                                view('manager::form.inputElement', [
                                    'name' => 'templatename',
                                    'value' => $data->templatename,
                                    'class' => 'form-control-lg',
                                    'attributes' => 'onchange="documentDirty=true;"',
                                ]) .
                                ($modx->hasPermission('save_role')
                                ? '<label class="custom-control" data-tooltip="' . __('global.lock_template') . "\n" . __('global.lock_template_msg') .'">' .
                                 view('manager::form.inputElement', [
                                    'type' => 'checkbox',
                                    'name' => 'locked',
                                    'checked' => $data->locked == 1,
                                    'value' => 1
                                 ]) .
                                 '<i class="' . $_style['icon_lock'] . '"></i>
                                 </label>
                                 <small class="form-text text-danger hide" id="savingMessage"></small>
                                 <script>if (!document.getElementsByName(\'templatename\')[0].value) document.getElementsByName(\'templatename\')[0].focus();</script>'
                                : '') .
                                '</div>',
                        ])

                        @include('manager::form.input', [
                            'name' => 'templatealias',
                            'id' => 'templatealias',
                            'label' => __('global.alias'),
                            'value' => $data->templatealias,
                            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
                        ])

                        @include('manager::form.input', [
                            'name' => 'templatecontroller',
                            'id' => 'templatecontroller',
                            'label' => __('global.templatecontroller'),
                            'value' => $data->templatecontroller,
                            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
                        ])

                        @include('manager::form.input', [
                            'name' => 'description',
                            'id' => 'description',
                            'label' => __('global.template_desc'),
                            'value' => $data->description,
                            'attributes' => 'onchange="documentDirty=true;" maxlength="255"',
                        ])

                        @include('manager::form.select', [
                            'name' => 'category',
                            'id' => 'category',
                            'label' => __('global.existing_category'),
                            'value' => $data->category,
                            'first' => [
                                'text' => '',
                            ],
                            'options' => $categories->pluck('category', 'id'),
                            'attributes' => 'onchange="documentDirty=true;"',
                        ])

                        @include('manager::form.input', [
                            'name' => 'newcategory',
                            'id' => 'newcategory',
                            'label' => __('global.new_category'),
                            'value' => '',
                            'attributes' => 'onchange="documentDirty=true;" maxlength="45"',
                        ])

                    </div>

                    <div class="form-group">
                        @if(file_exists(MODX_BASE_PATH . 'views/' . $data->templatealias . '.blade.php'))
                            {{ __('global.template_assigned_blade_file') }}:
                            <strong>/views/{{ $data->templatealias }}.blade.php</strong>
                        @else
                            <div class="create-check">
                                <label>
                                    @include('manager::form.inputElement', [
                                        'name' => 'createbladefile',
                                        'id' => 'createbladefile',
                                        'type' => 'checkbox',
                                        'checked' => false,
                                        'attributes' => 'onchange="documentDirty=true;"',
                                    ])

                                    {{ __('global.template_create_blade_file') }}
                                </label>
                            </div>
                        @endif
                    </div>

                    @if($modx->hasPermission('save_role'))
                        <div class="form-group">
                            <label>
                                @include('manager::form.inputElement', [
                                    'name' => 'selectable',
                                    'id' => 'selectable',
                                    'type' => 'checkbox',
                                    'checked' => $data->selectable == 1,
                                    'value' => 1,
                                    'attributes' => 'onchange="documentDirty=true;"',
                                ])
                                {{ __('global.template_selectable') }}
                            </label>
                        </div>
                    @endif
                </div>

                <!-- HTML text editor start -->
                <div class="navbar navbar-editor">
                    <span>{{ __('global.template_code') }}</span>
                </div>
                <div class="section-editor clearfix">
                    @include('manager::form.textareaElement', [
                        'name' => 'post',
                        'value' => $data->post ?? $data->content,
                        'class' => 'phptextarea',
                        'rows' => 20,
                        'attributes' => 'onChange="documentDirty=true;"',
                    ])
                </div>
                <!-- HTML text editor end -->

                <input type="submit" name="save" style="display:none">
            </div>

            <div class="tab-page" id="tabAssignedTVs">
                <h2 class="tab">{{ __('global.template_assignedtv_tab') }}</h2>
                <script>tp.addTabPage(document.getElementById('tabAssignedTVs'))</script>
                <input type="hidden" name="tvsDirty" id="tvsDirty" value="0">

                <div class="container container-body">
                    @if($data->tvs->count() > 0)
                        <p>{{ __('global.template_tv_msg') }}</p>
                    @endif

                    @if($modx->hasPermission('save_template') && $data->tvs->count() > 1 && $data->getKey())
                        <div class="form-group">
                            <a class="btn btn-primary"
                               href="?a=117&id={{ $data->getKey() }}">{{ __('global.template_tv_edit') }}</a>
                        </div>
                    @endif

                    @if($data->tvs->count() > 0)
                        <ul>
                            @foreach($data->tvs as $item)
                                @include('manager::page.template.tv', [
                                    'item' => $item,
                                    'tvSelected' => [$item->getKey()],
                                ])
                            @endforeach
                        </ul>
                    @else
                        {{ __('global.template_no_tv') }}
                    @endif

                    @if($tvOutCategory->count() || $categoriesWithTv->count())
                        <hr>
                        <p>{{ __('global.template_notassigned_tv') }}</p>
                    @endif

                    @if($tvOutCategory->count() > 0)
                        @component('manager::partials.panelCollapse', ['name' => 'tv_in_template', 'id' => 0, 'title' => __('global.no_category')])
                            <ul>
                                @foreach($tvOutCategory as $item)
                                    @include('manager::page.template.tv', compact('item', 'tvSelected'))
                                @endforeach
                            </ul>
                        @endcomponent
                    @endif

                    @foreach($categoriesWithTv as $cat)
                        @component('manager::partials.panelCollapse', ['name' => 'tv_in_template', 'id' => $cat->id, 'title' => $cat->name])
                            <ul>
                                @foreach($cat->tvs as $item)
                                    @if(! $data->tvs->contains('id', $item->getKey()))
                                        @include('manager::page.template.tv', compact('item', 'tvSelected'))
                                    @endif
                                @endforeach
                            </ul>
                        @endcomponent
                    @endforeach
                </div>
            </div>

            {!! get_by_key($events, 'OnTempFormRender') !!}
        </div>
    </form>
@endsection
