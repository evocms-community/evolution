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
            - {!! $item->description !!}
        @endif
        @if(!empty($item->locked))
            <em>(@lang('global.locked'))</em>
        @endif
        @if($item->getKey() == get_by_key($modx->config, 'default_template'))
            <em>(@lang('global.defaulttemplate_title'))</em>
        @endif
    </label>
</li>
