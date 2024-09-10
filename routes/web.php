<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MarslanderController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomepageController::class)->name('home');

Route::get(
    '/inscription/{marslander:inscription_id}',
    MarslanderController::class
)->name('inscription');
