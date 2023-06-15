@extends('directory::layout')

@section('pagetitle', $folder ? $folder->pagetitle : $container->pagetitle)

@section('buttons')
    <div id="actions">
        <div class="btn-group">
            <a class="btn btn-success" href="index.php?a=4&pid={{ $container->id }}">
                <i class="fa fa-file-o"></i><span>{{ $lang['create_child'] }}</span>
            </a>

            @if (request()->has('filter'))
                <a href="javascript:;" class="btn btn-secondary" onclick="location = location.pathname;">
                    <i class="fa fa-times-circle"></i><span>@lang('directory::messages.reset_filters')</span>
                </a>
            @endif

            <a href="javascript:;" class="btn btn-secondary" onclick="location.reload();">
                <i class="fa fa-refresh"></i><span>@lang('directory::messages.refresh')</span>
            </a>
            <a class="btn btn-secondary" href="index.php?a=27&id={{ $container->id }}">
                <i class="fa fa-pencil"></i><span>{{ $lang['edit_document'] }}</span>
            </a>
        </div>
    </div>
@endsection

@if (!empty($crumbs))
    @section('breadcrumbs')
        <div class="crumbs">
            <ul>
                @foreach ($crumbs as $crumb)
                    @if ($loop->last)
                        <li class="current-crumb">
                            {{ $crumb->pagetitle }}
                    @else
                        <li class="crumb">
                            <a href="{{ route('directory::show', ['container' => $config['id'], 'folder' => $crumb->id != $container->id ? $crumb->id : null]) }}">
                                @if ($loop->first)
                                    <i class="fa fa-home"></i>
                                @else
                                    {{ $crumb->pagetitle }}
                                @endif
                            </a>
                    @endif
                @endforeach
            </ul>
        </div>
    @endsection
@endif

@section('body')
    <div class="tab-page" id="tab_main">
        <h2 class="tab">
            {{ $lang['documents_list'] }}
        </h2>

        <script type="text/javascript">
            tpModule.addTabPage(document.getElementById('tab_main'));
        </script>

        <form method="get">
            <div class="row">
                <table class="table data">
                    @if ($items->count())
                        <thead>
                            <tr>
                                <td style="width: 1%;">
                                    <input type="checkbox" class="check-all" title="{{ $lang['select_all'] }}">
                                </td>
                                <td style="width: 1%;"></td>
                                @foreach ($config['columns'] as $column)
                                    <td class="{{ $column['class'] ?? '' }}" {!! $column['attrs'] ?? '' !!}>
                                        {{ $column['caption'] ?? '' }}
                                    </td>
                                @endforeach
                            </tr>
                        </thead>
                    @endif

                    <tbody class="directory-list">
                        @if ($folder)
                            <tr>
                                <td></td>
                                <td></td>

                                @foreach ($config['columns'] as $key => $column)
                                    <td class="{{ $key }}-column {{ $column['class'] ?? '' }}" {!! $column['attrs'] ?? '' !!}>
                                        @if ($key == 'pagetitle')
                                            <i class="fa fa-level-up"></i>
                                            <a href="{{ route('directory::show', ['container' => $config['id'], 'folder' => $folder->parent != $container->id ? $folder->parent : null]) }}">
                                                ...
                                            </a>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endif

                        <tr>
                            <td colspan="2"><button type="submit" style="width:100%"><i class="fas fa-search" title="Применить фильтр"></i></td>
                            @foreach ($config['columns'] as $key => $column)
                                <td class="{{ $key }}-column {{ $column['class'] ?? '' }}" {!! $column['attrs'] ?? '' !!}>
                                    @if (!isset($column['filterable']) || $column['filterable'] != false)
                                        <input type="text" name="filter[{{  $key }}]" value="{{ Str::of($_GET['filter'][$key] ?? '')->trim() }}">
                                    @endif
                                </td>
                            @endforeach
                        </tr>


                        @forelse ($items as $item)
                            <tr class="{{ $item->deleted ? 'item-deleted' : ''}} {{ !$item->published ? 'item-unpublished' : ''}} {{ $item->hidemenu ? 'item-hidden' : ''}}" data-published="{{ $item->published }}" data-deleted="{{ $item->deleted }}" data-isfolder="{{ $item->isfolder }}" id="node{{ $item->id }}">
                                <td data-published="{{ $item->published }}" data-deleted="{{ $item->deleted }}" data-isfolder="{{ $item->isfolder }}" data-href="@makeUrl($item->id)"><input type="checkbox" name="selected[]" value="{{ $item->id }}"></td>
                                <td class="toggle-item-menu" onclick='directory.showMenu(event, {{ $item->id }}, "{{ htmlentities($item->pagetitle) }}");' oncontextmenu="this.onclick(event); return false;"><span class="fa fa-bars"></span></td>

                                @foreach ($config['columns'] as $key => $column)
                                    <td class="{{ $key }}-column {{ $column['class'] ?? '' }}" {!! $column['attrs'] ?? '' !!}>
                                        @if (isset($column['renderer']))
                                            {!! call_user_func($column['renderer'], $item->getAttribute($key), $item, $config) !!}
                                        @else
                                            {{ $item->getAttribute($key) }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="{{ count($config['columns']) + 2 }}">
                                    {{ $lang['no_items'] }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($items->count())
                    <div class="table-footer flex">
                        <div class="selected-control">
                            <label>
                                <input type="checkbox" class="check-all" title="{{ $lang['select_all'] }}"> {{ $lang['select_all'] }}
                            </label>
                        </div>

                        @if ($items->total() > $items->count())
                            <div class="selected-control">
                                <label>
                                    <input type="checkbox" name="selected" value="all"> @lang('directory::messages.select_whole_list', [
                                        'total' => $items->total(),
                                    ])
                                </label>
                            </div>
                        @endif

                        @if ($config['show_actions'] && !empty($config['actions']))
                            <div class="list-actions">
                                <select name="action" class="form-control">
                                    <option value="">-- {{ $lang['choose_action'] }} --</option>
                                    @foreach ($config['actions'] as $action)
                                        <option value="{{ $action }}">{{ $lang['action_' . $action] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="list-summary">
                            @lang('directory::messages.shown_from', [
                                'first' => $items->firstItem(),
                                'last'  => $items->lastItem(),
                                'total' => $items->total(),
                            ])
                        </div>

                        {{ $items->links('directory::links') }}

                        <div class="limits">
                            <select name="limit" class="form-control">
                                @foreach ($config['limits'] as $limit)
                                    <option @if ($currentLimit == $limit) selected @endif>{{ $limit }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>

            <input type="hidden" name="container_id" value="{{ $container->id }}">
            <input type="hidden" name="folder_id" value="{{ $folder ? $folder->id : $container->id }}">
        </form>
    </div>
@endsection

@push('scripts')
    <div id="mx_contextmenu" class="dropdown" onselectstart="return false;">
        <div id="nameHolder">&nbsp;</div>

        @if (evo()->hasPermission('new_document'))
            <div class="menuLink" id="item3" onclick="directory.menuHandler(3);">
                <i class="fa fa-file-o"></i>
                @lang('global.create_resource_here')
            </div>
        @endif

        @if (evo()->hasPermission('edit_document'))
            <div class="menuLink" id="item2" onclick="directory.menuHandler(2);">
                <i class="fa fa-edit"></i>
                @lang('global.edit_resource')
            </div>
        @endif

        @if (evo()->hasPermission('save_document'))
            <div class="menuLink" id="item5" onclick="directory.menuHandler(5);">
                <i class="fa fa-arrows"></i>
                @lang('global.move_resource')
            </div>
        @endif

        @if (evo()->hasPermission('new_document'))
            <div class="menuLink" id="item7" onclick="directory.menuHandler(7);">
                <i class="fa fa-clone"></i>
                @lang('global.resource_duplicate')
            </div>
        @endif

        @if (evo()->hasPermission('edit_document') && evo()->hasPermission('save_document'))
            <div class="menuLink" id="item11" onclick="directory.menuHandler(11);">
                <i class="fa fa-sort-numeric-asc"></i>
                @lang('global.sort_menuindex')
            </div>
        @endif

        <div class="seperator"></div>

        @if (evo()->hasPermission('publish_document'))
            <div class="menuLink" id="item9" onclick="directory.menuHandler(9);" style="display: none;">
                <i class="fa fa-check"></i>
                @lang('global.publish_resource')
            </div>

            <div class="menuLink" id="item10" onclick="directory.menuHandler(10);" style="display: block;">
                <i class="fa fa-close"></i>
                @lang('global.unpublish_resource')
            </div>
        @endif

        @if (evo()->hasPermission('delete_document'))
            <div class="menuLink" id="item4" onclick="directory.menuHandler(4);" style="display: block;">
                <i class="fa fa-trash"></i>
                @lang('global.delete_resource')
            </div>

            <div class="menuLink" id="item8" onclick="directory.menuHandler(8);" style="display: none;">
                <i class="fa fa-undo"></i>
                @lang('global.undelete_resource')
            </div>
        @endif

        <div class="seperator"></div>

        @if (evo()->hasPermission('new_document'))
            <div class="menuLink" id="item6" onclick="directory.menuHandler(6);">
                <i class="fa fa-link"></i>
                @lang('global.create_weblink_here')
            </div>
        @endif

        <div class="seperator"></div>

        @if (evo()->hasPermission('view_document'))
            <div class="menuLink" id="item1" onclick="directory.menuHandler(1);">
                <i class="fa fa-info"></i>
                @lang('global.resource_overview')
            </div>
        @endif

        <div class="menuLink" id="item12" onclick="directory.menuHandler(12);">
            <i class="fa fa-eye"></i>
            @lang('global.preview_resource')
        </div>
    </div>

    <script>
        var directory = {
            init: function() {
                this.initChecks();

                $('#tab_main form').submit(function() {
                    $(this).find('[name="limit"], [name="container_id"], [name="folder_id"], [name="action"]').attr('disabled', true);
                });

                $('.list-actions select').change(function() {
                    if (this.value == '') {
                        return;
                    }

                    parent.modx.main.work();

                    $.post("{{ route('directory::action') }}", $(this.form).serialize(), function(response) {
                        location.reload();
                    });
                });

                $('.limits select').on('change', function() {
                    $.post("{{ route('directory::limit', $container->id) }}", {limit: $(this).val()}, function(response) {
                        location.reload();
                    });
                });
            },

            initChecks: function() {
                var $checks = $('.directory-list input[type="checkbox"]'),
                    $pageCheck = $('.check-all'),
                    $listCheck = $('[name="selected"][value="all"]');

                $pageCheck.click(function(e) {
                    $checks.each(function() {
                        this.checked = !this.checked;
                    });

                    $pageCheck.not(this).get(0).checked = this.checked;

                    if ($listCheck.length) {
                        $listCheck.get(0).checked = false;
                    }
                });

                $listCheck.change(function(e) {
                    var selfChecked = this.checked;

                    $checks.each(function() {
                        this.checked = selfChecked;
                    });

                    $pageCheck.each(function() {
                        this.checked = selfChecked;
                    });
                });

                $checks.change(function() {
                    if ($listCheck.length) {
                        $listCheck.get(0).checked = false;
                    }

                    var allChecked = true;

                    $checks.each(function() {
                        if (!this.checked) {
                            allChecked = false;
                            return false;
                        }
                    });

                    $pageCheck.each(function() {
                        this.checked = allChecked;
                    });
                });
            },

            menuHandler: function(action) {
                switch (action) {
                    case 1:
                        parent.modx.tabs({
                            url: parent.modx.MODX_MANAGER_URL + "?a=3&id=" + this.itemToChange,
                            title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                        });
                        break;
                    case 2:
                        parent.modx.tabs({
                            url: parent.modx.MODX_MANAGER_URL + "?a=27&r=1&id=" + this.itemToChange,
                            title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                        });
                        break;
                    case 3:
                        parent.modx.tabs({
                            url: parent.modx.MODX_MANAGER_URL + "?a=4&pid=" + this.itemToChange,
                            title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                        });
                        break;
                    case 4:
                        if (this.selectedObjectDeleted) {
                            alert('"' + this.selectedObjectName + '" ' + parent.modx.lang.already_deleted);
                        } else {
                            confirm('"' + this.selectedObjectName + '"\n\n' + parent.modx.lang.confirm_delete_resource) === !0 && parent.modx.tabs({
                                url: parent.modx.MODX_MANAGER_URL + "?a=6&id=" + this.itemToChange,
                                title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                            });
                        }
                        break;
                    case 5:
                        parent.modx.tabs({
                            url: parent.modx.MODX_MANAGER_URL + "?a=51&id=" + this.itemToChange,
                            title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                        });
                        break;
                    case 6:
                        parent.modx.tabs({
                            url: parent.modx.MODX_MANAGER_URL + "?a=72&pid=" + this.itemToChange,
                            title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                        });
                        break;
                    case 7:
                        if (confirm(parent.modx.lang.confirm_resource_duplicate)) {
                            parent.modx.tabs({
                                url: parent.modx.MODX_MANAGER_URL + "?a=94&id=" + this.itemToChange,
                                title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                            });
                        }
                        break;
                    case 8:
                        if (this.selectedObjectDeleted) {
                            if (confirm('"' + this.selectedObjectName + '" ' + parent.modx.lang.confirm_undelete)) {
                                parent.modx.tabs({
                                    url: parent.modx.MODX_MANAGER_URL + "?a=63&id=" + this.itemToChange,
                                    title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                                });
                            }
                        } else {
                            alert('"' + this.selectedObjectName + '"' + parent.modx.lang.not_deleted);
                        }
                        break;
                    case 9:
                        if (confirm('"' + this.selectedObjectName + '" ' + parent.modx.lang.confirm_publish)) {
                            parent.modx.tabs({
                                url: parent.modx.MODX_MANAGER_URL + "?a=61&id=" + this.itemToChange,
                                title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                            });
                        }
                        break;
                    case 10:
                        if (this.itemToChange !== parent.modx.config.site_start) {
                            if (confirm('"' + this.selectedObjectName + '" ' + parent.modx.lang.confirm_unpublish)) {
                                parent.modx.tabs({
                                    url: parent.modx.MODX_MANAGER_URL + "?a=62&id=" + this.itemToChange,
                                    title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                                });
                            }
                        } else {
                            alert("Document is linked to site_start variable and cannot be unpublished!");
                        }
                        break;
                    case 11:
                        parent.modx.tabs({
                            url: parent.modx.MODX_MANAGER_URL + "?a=56&id=" + this.itemToChange,
                            title: this.selectedObjectName + "<small>(" + this.itemToChange + ")</small>"
                        });
                        break;
                    case 12:
                        window.open(document.getElementById("node" + this.itemToChange).firstElementChild.dataset.href, "previeWin");
                        break;
                    default:
                        alert("Unknown operation command.");
                }

                if ([7, 9, 10, 4, 8].indexOf(action) !== -1) {
                    location.reload();
                }
            },

            showMenu: function(e, id, title) {
                if (e.ctrlKey) {
                    return;
                }

                e.preventDefault();
                e.stopPropagation();

                var el = e.currentTarget,
                    row = e.currentTarget.parentElement,
                    x = 0,
                    y = 0;

                if (el) {
                    var menu = document.getElementById('mx_contextmenu');
                    e.target.dataset.toggle = '#mx_contextmenu';
                    parent.modx.hideDropDown(e);

                    var i4 = document.getElementById('item4'),
                        i5 = document.getElementById('item5'),
                        i8 = document.getElementById('item8'),
                        i9 = document.getElementById('item9'),
                        i10 = document.getElementById('item10'),
                        i11 = document.getElementById('item11');

                    if (parent.modx.permission.publish_document === 1) {
                        i9.style.display = 'block';
                        i10.style.display = 'block';
                        if (parseInt(row.dataset.published) === 1) {
                            i9.style.display = 'none';
                        } else {
                            i10.style.display = 'none';
                        }
                    } else if (i5) {
                        i5.style.display = 'none';
                    }

                    if (parent.modx.permission.delete_document === 1) {
                        i4.style.display = 'block';
                        i8.style.display = 'block';
                        if (parseInt(row.dataset.deleted) === 1) {
                            i4.style.display = 'none';
                            i9.style.display = 'none';
                            i10.style.display = 'none';
                        } else {
                            i8.style.display = 'none';
                        }
                    }
                    if (i11) {
                        if (parseInt(row.dataset.isfolder) === 1) {
                            i11.style.display = 'block';
                        } else {
                            i11.style.display = 'none';
                        }
                    }

                    x = e.clientX > 0 ? e.clientX : e.pageX;
                    y = e.clientY > 0 ? e.clientY : e.pageY;
                    if (y + menu.offsetHeight / 2 > window.innerHeight) {
                        y = window.innerHeight - menu.offsetHeight - 5;
                    } else if (y - menu.offsetHeight / 2 < 0) {
                        y = 0 + 5;
                    } else {
                        y = y - menu.offsetHeight / 2;
                    }

                    y += window.scrollY;

                    if (title.length > 30) {
                        title = title.substr(0, 30) + '...';
                    }
                    var f = document.getElementById('nameHolder');
                    f.innerHTML = title;
                    menu.style.left = x + (parent.modx.config.textdir === 'rtl' ? '-190' : '') + 'px';
                    menu.style.top = y + 'px';
                    menu.classList.add('show');

                    this.selectedObjectName = title;
                    this.selectedObjectDeleted = parseInt(row.dataset.deleted) === 1;
                    this.itemToChange = id;
                }
            }
        };

        directory.init();

        parent.directory.registerInstance(window, directory);
    </script>
@endpush
