<?php

use EvolutionCMS\Facades\ManagerTheme;

/** @var EvolutionCMS\Models\SiteTmplvar $item */
?>
<li>
    <label>
        @include('manager::form.inputElement', [
            'type' => 'checkbox',
            'name' => 'assignedTv[]',
            'checked' => is_array($tvSelected) && in_array($item->getKey(), $tvSelected, true),
            'value' => $item->getKey(),
            'attributes' => 'onchange="documentDirty=true; document.getElementById(\'tvsDirty\').value = 1;"'
        ])
        {{ $item->name }}
        <small>({{ $item->getKey() }})</small> - {{ $item->caption }}
    </label>
    @if(!empty($item->locked))
        <em>(@lang('global.locked'))</em>
    @endif
    @if(!empty($item->isAlreadyEdit))
        <?php $rowLock = $item->alreadyEditInfo; ?>
        <span title="{{ str_replace(['[+lasthit_df+]', '[+element_type+]'], [$rowLock['lasthit_df'], ManagerTheme::getLexicon('lock_element_type_2')], ManagerTheme::getLexicon('lock_element_editing')) }}" class="editResource" style="cursor:context-menu;">
            <i class="{{ ManagerTheme::getStyle('icon_eye') }}"></i>
        </span>
    @else
        <a href="{{ $item->makeUrl('actions.edit') }}&or={{ $action ?? 0 }}&oid={{ $item->getKey() }}">
            <i class="{{ ManagerTheme::getStyle('icon_edit') }}"></i>
            @lang('global.edit')
        </a>
    @endif
</li>
