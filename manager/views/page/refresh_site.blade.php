<?php

use EvolutionCMS\Facades\ManagerTheme;

?>
@extends('manager::template.page')
@section('content')
    <h1>{{ __('global.refresh_title') }}</h1>
    <div id="actions">
        <div class="btn-group">
            <a id="Button1" class="btn btn-success" href="index.php?a=26">
                <i class="{{ ManagerTheme::getStyle('icon_recycle') }}"></i>{{ __('global.refresh_site') }}
            </a>
        </div>
    </div>

    <div class="tab-page">
        <div class="container container-body">
            @if($num_rows_pub)
                <p>{!! sprintf(__('global.refresh_published'), (int)$num_rows_pub) !!}</p>
            @endif
            @if($num_rows_unpub)
                <p>{!! sprintf(__('global.refresh_unpublished'), (int)$num_rows_unpub) !!}</p>
            @endif
            {!! $cache_log !!}
        </div>
    </div>
@endsection
