<?php

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Models\SiteModule;

?>
<div class="tab-page {{ $tabPageName }}" id="{{ $tabIndexPageName }}">
    <h2 class="tab">
        <a href="?a=76&tab={{ $index }}"><i
                    class="{{ ManagerTheme::getStyle('icon_modules') }}"></i>{{ __('global.modules') }}</a>
    </h2>

    <script>
      tpResources.addTabPage(document.getElementById('{{ $tabIndexPageName }}'));
    </script>

    <div id="{{ $tabIndexPageName }}-info" class="msg-container" style="display:none">
        <div class="element-edit-message-tab">{!! __('global.module_management_msg') !!}</div>
        <p class="viewoptions-message">{{ __('global.view_options_msg') }}</p>
    </div>

    <div id="_actions">
        <form class="btn-group form-group form-inline">
            @csrf
            <div class="input-group input-group-sm">
                <input class="form-control filterElements-form" type="text" id="{{ $tabIndexPageName }}_search"
                       size="30" placeholder="{{ __('global.element_filter_msg') }}"/>
                <div class="input-group-btn">
                    @if (evo()->hasPermission('new_module') && evo()->hasPermission('save_module'))
                        <a class="btn btn-success" target="main"
                           href="{{ (new SiteModule())->makeUrl('actions.new') }}">
                            <i class="{{ ManagerTheme::getStyle('icon_add') }}"></i>
                            <span>{{ __('global.new_module') }}</span>
                        </a>
                    @endif
                    <a class="btn btn-secondary" href="javascript:;" id="{{ $tabIndexPageName }}-help">
                        <i class="{{ ManagerTheme::getStyle('icon_question_circle') }}"></i>
                        <span>{{ __('global.help') }}</span>
                    </a>
                    <a class="btn btn-secondary switchform-btn" href="javascript:;"
                       data-target="switchForm_{{ $tabIndexPageName }}">
                        <i class="{{ ManagerTheme::getStyle('icon_bars') }}"></i>
                        <span>{{ __('global.btn_view_options') }}</span>
                    </a>
                </div>
            </div>
        </form>
    </div>

    @include('manager::page.resources.helper.switchButtons', ['id' => $tabIndexPageName])

    <div class="clearfix"></div>
    <div class="panel-group no-transition">
        <div id="{{ $tabIndexPageName }}_content" class="resourceTable panel panel-default">
            @if (isset($outCategory) && $outCategory->count() > 0)
                @component('manager::partials.panelCollapse', [
                    'name' => $tabIndexPageName . '_content',
                    'id' => 0,
                    'title' => __('global.no_category'),
                ])
                    <ul class="elements">
                        @foreach ($outCategory as $item)
                            @include(
                                'manager::page.resources.elements.module',
                                compact('item', 'tabIndexPageName', 'action'))
                        @endforeach
                    </ul>
                @endcomponent
            @endif

            @if (isset($categories))
                @foreach ($categories as $cat)
                    @component('manager::partials.panelCollapse', [
                        'name' => $tabIndexPageName . '_content',
                        'id' => $cat->id,
                        'title' => $cat->name,
                    ])
                        <ul class="elements">
                            @foreach ($cat->modules as $item)
                                @include(
                                    'manager::page.resources.elements.module',
                                    compact('item', 'tabIndexPageName', 'action'))
                            @endforeach
                        </ul>
                    @endcomponent
                @endforeach
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
</div>

@push('scripts.bot')
    <script>
      initQuicksearch('{{ $tabIndexPageName }}_search', '{{ $tabIndexPageName }}_content');
      initViews('ch', '{{ $tabIndexPageName }}', '{{ $tabIndexPageName }}_content');
    </script>
@endpush
