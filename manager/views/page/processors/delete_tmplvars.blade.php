@extends('manager::template.page')
@section('content')
    <h1><i class="{{ $_style['icon_tv'] }}"></i>{{ __('global.tmplvars') }}</h1>

    <script>
        var actions = {
            delete: function() {
                document.location.href = "index.php?id={{ $id }}&a=303&force=1";
            },
            cancel: function() {
                window.location.href = "index.php?a=301&id={{ $id }}";
            }
        };
    </script>

    {!! $buttons !!}

    <div class="tab-page">
        <div class="container container-body">
            <p>{{ __('global.tmplvar_inuse') }}</p>

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
                                    <a href="index.php?id={{ $row->resource->id }}&a=27">{{ $row->resource->pagetitle }}</a>

                                </div>
                                <div class="mainCell">
                                    {{ $row->resource->description }}
                                </div>
                                <div class="mainCell">
                                    {{ $row->resource->introtext }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
