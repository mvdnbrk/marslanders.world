<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\MarslanderController;

Route::get('/', HomepageController::class)->name('home');

Route::get('/collection', CollectionController::class)->name('collection');

Route::get(
    '/inscription/{marslander:inscription_id}',
    MarslanderController::class
)->name('inscription');
