<?php

use EvolutionCMS\Facades\ManagerTheme;

?>
@extends('manager::template.page')
@section('content')
    @push('scripts.top')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let h1help = document.querySelector('h1 > .help');
                h1help.onclick = function() {
                    document.querySelector('.element-edit-message').classList.toggle('show');
                };
            });
        </script>
    @endpush
    <form name="logging" method="post" class="form-group">
        @csrf
        <h1>
            <i class="{{ ManagerTheme::getStyle('icon_user_secret') }}"></i>{{ ManagerTheme::getLexicon('mgrlog_view') }}<i
                class="fa fa-question-circle help"></i>
        </h1>

        <div class="container element-edit-message">
            <div class="alert alert-info">{!! ManagerTheme::getLexicon('mgrlog_query_msg') !!}</div>
        </div>

        <div class="tab-page">
            <div class="container container-body">
                <div class="row form-row">
                    <div class="col-5 col-md-3 col-lg-2">{{ ManagerTheme::getLexicon('mgrlog_user') }}</div>
                    <div class="col-5 col-md-4 col-lg-3">
                        <select name="searchuser" class="form-control">
                            <option value="0">{{ ManagerTheme::getLexicon('mgrlog_anyall') }}</option>
                            @foreach ($form['users'] as $item)
                                <option value="{{ $item['internalKey'] }}"
                                    @if ($item['active']) selected @endif>{{ e($item['username']) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-5 col-md-3 col-lg-2">{{ ManagerTheme::getLexicon('mgrlog_action') }}</div>
                    <div class="col-5 col-md-4 col-lg-3">
                        <select name="action" class="form-control">
                            <option value="0">{{ ManagerTheme::getLexicon('mgrlog_anyall') }}</option>
                            @foreach ($form['actions'] as $item)
                                <option value="{{ $item['action'] }}" @if ($item['active']) selected @endif>
                                    {{ $item['actionname'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-5 col-md-3 col-lg-2">{{ ManagerTheme::getLexicon('mgrlog_itemid') }}</div>
                    <div class="col-5 col-md-4 col-lg-3">
                        <select name="itemid" class="form-control">
                            <option value="0">{{ ManagerTheme::getLexicon('mgrlog_anyall') }}</option>
                            @foreach ($form['items'] as $item)
                                <option value="{{ $item['itemid'] }}" @if ($item['active']) selected @endif>
                                    {{ $item['itemid'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-5 col-md-3 col-lg-2">{{ ManagerTheme::getLexicon('mgrlog_itemname') }}</div>
                    <div class="col-5 col-md-4 col-lg-3">
                        <select name="itemname" class="form-control">
                            <option value="0">{{ ManagerTheme::getLexicon('mgrlog_anyall') }}</option>
                            @foreach ($form['names'] as $item)
                                <option value="{{ $item['itemname'] }}" @if ($item['active']) selected @endif>
                                    {{ e($item['itemname']) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-5 col-md-3 col-lg-2">{{ ManagerTheme::getLexicon('mgrlog_msg') }}</div>
                    <div class="col-5 col-md-4 col-lg-3">
                        <input type="text" name="message" class="form-control" value="{{ $form['message'] }}" />
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-5 col-md-3 col-lg-2">{{ ManagerTheme::getLexicon('mgrlog_datefr') }}</div>
                    <div class="col-5 col-md-4 col-lg-3">
                        <div class="input-group">
                            <input type="text" id="datefrom" name="datefrom" class="form-control unstyled DatePicker"
                                value="{{ $form['datefrom'] }}" />
                            <i onClick="document.logging.datefrom.value=''; return true;"
                                class="clearDate {{ ManagerTheme::getStyle('icon_calendar_close') }}"
                                title="{{ ManagerTheme::getLexicon('remove_date') }}"></i>
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-5 col-md-3 col-lg-2">{{ ManagerTheme::getLexicon('mgrlog_dateto') }}</div>
                    <div class="col-5 col-md-4 col-lg-3">
                        <div class="input-group">
                            <input type="text" id="dateto" name="dateto" class="form-control unstyled DatePicker"
                                value="{{ $form['dateto'] }}" />
                            <i onClick="document.logging.dateto.value=''; return true;"
                                class="clearDate {{ ManagerTheme::getStyle('icon_calendar_close') }}"
                                title="{{ ManagerTheme::getLexicon('remove_date') }}"></i>
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-5 col-md-3 col-lg-2">{{ ManagerTheme::getLexicon('mgrlog_results') }}</div>
                    <div class="col-5 col-md-4 col-lg-3">
                        <input type="number" name="amount" min="1" step="1" class="form-control"
                            value="{{ $form['amount'] }}" />
                    </div>
                </div>

                <div class="row form-row">
                    <button type="submit" class="btn btn-success"><i class="{{ ManagerTheme::getStyle('icon_search') }}"></i>
                        {{ ManagerTheme::getLexicon('mgrlog_searchlogs') }}</button>
                    <a class="btn btn-secondary" href="index.php?a=13" onclick="documentDirty=false;"><i
                            class="{{ ManagerTheme::getStyle('icon_cancel') }}"></i>
                        {{ ManagerTheme::getLexicon('cancel') }}</a>
                </div>
            </div>
        </div>
    </form>

    <div class="navbar">
        <h1><i class="fas fa-th-list"></i> {{ ManagerTheme::getLexicon('mgrlog_qresults') }}</h1>
    </div>

    <div class="tab-page">
        <div class="container container-body">
            <div class="row">
                <div class="col">
                    <p>{!! ManagerTheme::getLexicon('mgrlog_sortinst') !!}</p>
                </div>
                <div class="table-responsive">
                    {!! $result !!}
                </div>
            </div>
        </div>
    </div>
@endsection
