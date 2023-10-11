<?php /** @var EvolutionCMS\Models\SiteTemplate $item */ ?>
<li>
    <label @if(!$item->selectable) class="disabled" @endif>
        @include('manager::form.inputElement', [
            'type' => 'checkbox',
            'name' => 'template[]',
            'checked' => !empty($selected),
            'value' => $item->getKey(),
            'attributes' => 'onchange="documentDirty=true;"'
        ])
        {{ $item->name }}
        <small>({{ $item->getKey() }})</small>
        @if(!empty($item->description))
            - <span class="elements_descr">{!! str_replace(['&lt;strong&gt;', '&lt;/strong&gt;'], ['<strong>', '</strong>'], e($item->description)) !!}</span>
        @endif
        @if(!empty($item->locked))
            <em>(@lang('global.locked'))</em>
        @endif
        @if($item->getKey() == get_by_key(evo()->config, 'default_template'))
            <em>(@lang('global.defaulttemplate_title'))</em>
        @endif
    </label>
</li>
