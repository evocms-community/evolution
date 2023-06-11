@extends('manager::template.page')
@section('content')



        <div class="tab-page">
            <div class="container container-body">
                <div class="row searchbar form-group align-items-center">
                    <div class="col-sm-6 input-group">
                        <h1>
                            <i class="{{ $_style['icon_web_user_access'] }}"></i>{{ $_GET['list'] == 'users' ? ManagerTheme::getLexicon('users_list') : ManagerTheme::getLexicon('documents_list') }} в группе {{ $group['name'] }}</i>
                        </h1>
                    </div>
                    <div class="col-sm-6 ">
                        <form name="resource" method="post" action="?{{ http_build_query($_GET) }}">
                            <div class="input-group float-right w-auto">
                                <input type="hidden" name="delete" value="" />
                                <input class="form-control form-control-sm" name="search" type="text" value="{{ $_POST['search'] ?? '' }}" placeholder="Поиск">
                                <div class="input-group-append">
                                    <a class="btn btn-secondary btn-sm" href="javascript:;" title="Поиск" onclick="searchResource(); return false;"><i class="fa fa-search"></i></a>
                                    <a class="btn btn-secondary btn-sm" href="javascript:;" title="Сброс" onclick="resetSearch(); return false;"><i class="fa fa-refresh"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                @if($list->count() === 0)
                    <i>no entries</i>
                @else
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table data nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">ID</th>
                                        <th>{{ $_GET['list'] == 'users' ? ManagerTheme::getLexicon('user') : ManagerTheme::getLexicon('resource') }}</th>
                                        <th style="width: 1%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><a href="?a={{ $_GET['list'] == 'users' ? 88 : 27 }}&id={{ $item->getKey() }}" target="main">{{ $_GET['list'] == 'users' ? $item->username : $item->pagetitle }}</a></td>
                                            <td><a title="Удалить из группы" href="javascript:;" onclick="deleteItem({{ $item->getKey() }}); return false;"><i class="fa fa-close fa-fw"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if($list->links()->paginator->hasPages())
                            @php
                                $paginator = $list->links()->paginator;
                                $elements = $list->links()->elements;
                            @endphp

                            <div class="mt-3">

                                <ul class="pagination" role="navigation">
                                    {{-- Previous Page Link --}}
                                    @if ($paginator->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($elements as $element)
                                        {{-- "Three Dots" Separator --}}
                                        @if (is_string($element))
                                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                                        @endif

                                        {{-- Array Of Links --}}
                                        @if (is_array($element))
                                            @foreach ($element as $page => $url)
                                                @if ($page == $paginator->currentPage())
                                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                                @else
                                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($paginator->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                        </li>
                                    @endif
                                </ul>

                            </div>
                        @endif
                    </div>
                @endif

            </div>

        </div>

<script type="text/javascript">
    function searchResource() {
        document.resource.submit();
    };

    function resetSearch() {
        document.resource.search.value = '';
        document.resource.submit();
    };

    function deleteItem(id) {
        if(confirm('Are you sure?')) {
            document.resource.delete.value = id;
            document.resource.submit();
        }
    }
</script>
@endsection

