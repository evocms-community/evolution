<?php

use EvolutionCMS\Controllers\Actions;
use Illuminate\Support\Facades\Route;

Route::match(['GET', 'POST'], '/', [Actions::class, 'handleAction']);
