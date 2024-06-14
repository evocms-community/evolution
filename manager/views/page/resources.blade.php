<?php

use EvolutionCMS\Facades\ManagerTheme;

?>
@extends('manager::template.page')

@push('scripts.bot')
    <script>
        var trans = {!! json_encode($unlockTranslations, JSON_UNESCAPED_UNICODE) !!},
            mraTrans = {!! json_encode($mraTranslations, JSON_UNESCAPED_UNICODE) !!};
    </script>
    <script src="media/script/jquery.quicksearch.js"></script>
    <script src="media/script/bootstrap/js/bootstrap.min.js"></script>
    <script src="media/script/resources-functions.js"></script>
@endpush

@section('content')
    <h1>
        <i class="{{ ManagerTheme::getStyle('icon_elements') }}"></i>{{ __('global.element_management') }}
    </h1>

    <div class="sectionBody">
        <div class="tab-pane" id="resourcesPane">
            <script>
                tpResources = new WebFXTabPane(document.getElementById('resourcesPane'), false);
            </script>

            @foreach($tabs as $tab)
                @if($tab instanceof EvolutionCMS\Interfaces\ManagerTheme\TabControllerInterface)
                    @include(ManagerTheme::getViewName($tab->getView()), $tab->getParameters())
                @else
                    {!! $tab !!}
                @endif
            @endforeach

            @if($activeTab !== '')
                <script> tpResources.setSelectedTab('{{ $activeTab }}');</script>
            @endif
        </div>
    </div>
@endsection
