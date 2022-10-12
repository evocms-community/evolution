<?php /** @var EvolutionCMS\Models\Permissions $item */ ?>
<li>
    <div class="rTable">
        <div class="rTableRow">
            @if(!empty($item->isAlreadyEdit))
                <div class="lockCell">
                    <?php $rowLock = $item->alreadyEditInfo; ?>
                    <span title="{{ str_replace(['[+lasthit_df+]', '[+element_type+]'], [$rowLock['lasthit_df'], __('global.lock_element_type_2')], __('global.lock_element_editing')) }}" class="editResource" style="cursor:context-menu;">
                        <i class="{{ $_style['icon_eye'] }}"></i>
                    </span>&nbsp;
                </div>
            @endif
            <div class="mainCell elements_description">
                <span>
                    <a class="man_el_name" data-type="{{ $tabIndexPageName }}" data-id="{{ $item->id }}" data-catid="{{ $item->category }}" href="{{ $item->makeUrl('actions.edit') }}">
                        <i class="fa fa-user-tag"></i>
                        @if($item->locked)
                            <i class="{{ $_style['icon_lock'] }}"></i>
                        @endif
                        {{ __('global.' . $item->lang_key ) }}
                        <small>({{ $item->id }})</small>
                        <span class="elements_descr">
                            {{ $item->caption }}
                            {!! $item->description !!}
                        </span>
                    </a>
                    @if(ManagerTheme::getTextDir() !== 'ltr')
                    &rlm;
                    @endif
                </span>
            </div>
            <div class="btnCell">
                <ul class="elements_buttonbar">
                    <li>
                        <a href="{{ $item->makeUrl('actions.edit') }}" title="{{ __('global.edit_resource') }}">
                            <i class="{{ $_style['icon_edit'] }}"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $item->makeUrl('actions.delete') }}&action=delete" title="{{ __('global.delete') }}" onclick="return confirm('{{ __('global.confirm_delete_permission') }}')">
                            <i class="{{ $_style['icon_trash'] }}"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</li>
