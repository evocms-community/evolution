<?php

use EvolutionCMS\Facades\ManagerTheme;

?>
@extends('manager::template.page')
@section('content')
    <h1>{{ ManagerTheme::getLexicon('web_user_title') }}</h1>

    <div id="actions">
        <div class="btn-group">
            <a class="btn btn-success" href="{{ $url }}">
                <i class="{{ ManagerTheme::getStyle('icon_edit') }}"></i>
                {{ ManagerTheme::getLexicon('edit') }}
            </a>
            <a class="btn btn-secondary" href="{{ $cancel_url }}">
                <i class="{{ ManagerTheme::getStyle('icon_cancel') }}"></i>
                {{ ManagerTheme::getLexicon('cancel') }}
            </a>
        </div>
    </div>

    <div class="sectionBody">
        <div class="tab-page">
            <div class="container container-body" id="disp">
                <p>
                    {!! ManagerTheme::getLexicon('password_msg', ['username' => $username, 'password'=>$password]) !!}
                </p>
            </div>
        </div>
    </div>
@endsection
