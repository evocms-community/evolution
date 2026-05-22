@extends('manager::template.page')
@section('content')
    <h1><i class="{{ $_style['icon_template'] }}"></i>{{ __('global.templates') }}</h1>

    <div class="tab-page">
        <div class="container container-body">
            <p>{{ __('global.template_inuse') }}</p>

            <div class="rTableWrapper">
                <div class="rTable rTableCustom">
                    <div class="rTableHeading">
                        <div class="rTableRow">
                            <div class="rTableHead">{{ __('global.pagetitle') }}</div>
                            <div class="rTableHead">{{ __('global.resource_description') }}</div>
                            <div class="rTableHead">{{ __('global.resource_summary') }}</div>
                        </div>
                    </div>
                    <div class="rTableBody">
                        @foreach ($rows as $row)
                            <div class="rTableRow">
                                <div class="mainCell elements_description">
                                    <a href="index.php?id={{ $row->id }}'&a=27">{{ $row->pagetitle }}</a>
                                </div>
                                <div class="mainCell">
                                    {{ $row->description }}
                                </div>
                                <div class="mainCell">
                                    {{ $row->introtext }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
