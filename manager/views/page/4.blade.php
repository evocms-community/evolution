<?php

use EvolutionCMS\Facades\ManagerTheme;

/** get the mutate page for adding content */
?>
@extends('manager::template.page')
@section('content')
    <?php include_once ManagerTheme::getFileProcessor('actions/mutate_content.dynamic.php');?>
@endsection
