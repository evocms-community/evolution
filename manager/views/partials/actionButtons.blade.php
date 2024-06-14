<?php

use EvolutionCMS\Facades\ManagerTheme;

// actions buttons templates
$action = $_REQUEST['a'] ?? '';
if (config('global.global_tabs') && !isset($_SESSION['stay'])) {
    $_REQUEST['stay'] = 2;
}
if (isset($_REQUEST['stay'])) {
    $_SESSION['stay'] = $_REQUEST['stay'];
} elseif (isset($_SESSION['stay'])) {
    $_REQUEST['stay'] = $_SESSION['stay'];
}
$stay = $_REQUEST['stay'] ?? '';
?>
<div id="actions">
    <div class="btn-group">
        @if(!empty($select) && !empty($save))
            <div class="btn-group">
                <a id="Button1" class="btn btn-success" href="javascript:;" onclick="actions.save();">
                    <i class="{{ ManagerTheme::getStyle('icon_save') }}"></i>
                    <span>@lang('global.save')</span>
                </a>
                <span class="btn btn-success plus dropdown-toggle"></span>
                <select id="stay" name="stay">
                    @if(!empty($new))
                        <option id="stay1" value="1"
                                @if($stay == 1)selected="selected"@endif>@lang('global.stay_new')</option>
                    @endif
                    <option id="stay2" value="2" @if($stay == 2)selected="selected"@endif>@lang('global.stay')</option>
                    <option id="stay3" value="" @if($stay == '')selected="selected"@endif>@lang('global.close')</option>
                </select>
            </div>
        @elseif(!empty($save))
            <a id="Button1" class="btn btn-success" href="javascript:;" onclick="actions.save();">
                <i class="{{ ManagerTheme::getStyle('icon_save') }}"></i>
                <span>@lang('global.save')</span>
            </a>
        @endif
        @if(!empty($duplicate))
            <a id="Button6" class="btn btn-secondary" href="javascript:;" onclick="actions.duplicate();">
                <i class="{{ ManagerTheme::getStyle('icon_clone') }}"></i>
                <span>@lang('global.duplicate')</span>
            </a>
        @endif
        @if(!empty($delete))
            <a id="Button3" class="btn btn-secondary" href="javascript:;" onclick="actions.delete();">
                <i class="{{ ManagerTheme::getStyle('icon_trash') }}"></i>
                <span>@lang('global.delete')</span>
            </a>
        @endif
        @if(!empty($cancel))
            <a id="Button5" class="btn btn-secondary" href="javascript:;" onclick="actions.cancel();">
                <i class="{{ ManagerTheme::getStyle('icon_cancel') }}"></i>
                <span>@lang('global.cancel')</span>
            </a>
        @endif
        @if(!empty($preview))
            <a id="Button4" class="btn btn-secondary" href="javascript:;" onclick="actions.view();">
                <i class="{{ ManagerTheme::getStyle('icon_eye') }}"></i>
                <span>@lang('global.preview')</span>
            </a>
        @endif
    </div>
</div>
