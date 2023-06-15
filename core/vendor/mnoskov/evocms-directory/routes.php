<?php

use EvolutionCMS\Directory\Controller;
use Illuminate\Support\Facades\Route;

Route::get('', [Controller::class, 'index'])
    ->name('directory::index');

Route::get('show/{container}/{folder?}', [Controller::class, 'show'])
    ->whereNumber('container')
    ->whereNumber('folder')
    ->name('directory::show');

Route::post('action', [Controller::class, 'action'])
    ->name('directory::action');

Route::post('limit/{container}', [Controller::class, 'setLimit'])
    ->whereNumber('container')
    ->name('directory::limit');

