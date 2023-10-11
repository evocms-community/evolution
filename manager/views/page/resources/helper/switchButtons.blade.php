<?php

use EvolutionCMS\Facades\ManagerTheme;

?>
<form id="switchForm_{{ $id }}" class="form-group form-inline switchForm"
    data-target="{{ $id }}_content" style="display:none">

    <div class="form-group mr-3">
        <div class="form-check mr-sm-2">
            <input class="form-check-input" id="radio_list_{{ $id }}" type="radio" name="view"
                value="list" />
            <label class="form-check-label"
                for="radio_list_{{ $id }}">{{ ManagerTheme::getLexicon('viewopts_radio_list') }}</label>
        </div>
        <div class="form-check mr-sm-2">
            <input class="form-check-input" id="radio_inline_{{ $id }}" type="radio" name="view"
                value="inline" />
            <label class="form-check-label"
                for="radio_inline_{{ $id }}">{{ ManagerTheme::getLexicon('viewopts_radio_inline') }}</label>
        </div>
        <div class="form-check mr-sm-2">
            <input class="form-check-input" id="radio_flex_{{ $id }}" type="radio" name="view"
                value="flex" />
            <label class="form-check-label mr-2"
                for="radio_flex_{{ $id }}">{{ ManagerTheme::getLexicon('viewopts_radio_flex') }}:</label>
            <input type="number" min="1" step="1" placeholder="Columns" name="columns"
                class="form-control form-control-sm columns" value="3" style="width: 60px;" />
        </div>
    </div>

    <div class="form-group mr-3">
        <div class="form-check mr-sm-2">
            <input class="form-check-input" id="cb_buttons_{{ $id }}" type="checkbox" name="cb_buttons"
                value="buttons" />
            <label class="form-check-label"
                for="cb_buttons_{{ $id }}">{{ ManagerTheme::getLexicon('viewopts_cb_buttons') }}</label>
        </div>
        <div class="form-check mr-sm-2">
            <input class="form-check-input" id="cb_descriptions_{{ $id }}" type="checkbox"
                name="cb_description" value="description" />
            <label class="form-check-label"
                for="cb_descriptions_{{ $id }}">{{ ManagerTheme::getLexicon('viewopts_cb_descriptions') }}</label>
        </div>
        <div class="form-check mr-sm-2">
            <input class="form-check-input" id="cb_icons_{{ $id }}" type="checkbox" name="cb_icons"
                value="icons" />
            <label class="form-check-label"
                for="cb_icons_{{ $id }}">{{ ManagerTheme::getLexicon('viewopts_cb_icons') }}</label>
        </div>
    </div>

    <div class="form-group mr-3">
        <div class="form-check mr-sm-2">
            <label class="form-check-label mr-2"
                for="fontsize_{{ $id }}">{{ ManagerTheme::getLexicon('viewopts_fontsize') }}:</label>
            <input type="number" min="0" step="1" placeholder="" name="fontsize"
                class="form-control form-control-sm fontsize" id="fontsize_{{ $id }}" value="10"
                style="width: 60px;" />
        </div>
    </div>

    <div class="form-group mr-3">
        <div class="form-check mr-sm-2">
            <input class="form-check-input cb_all" id="cb_alltabs_{{ $id }}" type="checkbox" name="cb_all"
                value="all" />
            <label class="form-check-label"
                for="cb_alltabs_{{ $id }}">{{ ManagerTheme::getLexicon('viewopts_cb_alltabs') }}</label>
        </div>
    </div>

    <div class="form-group mr-3">
        <div class="optionsLeft optionsReset">
            <a href="javascript:;" class="btn btn-danger btn-sm btn_reset">{{ ManagerTheme::getLexicon('reset') }}</a>
        </div>
    </div>
</form>
