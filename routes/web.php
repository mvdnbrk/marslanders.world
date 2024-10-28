<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\InscriptionController;

Route::get('/', HomepageController::class)->name('home');

Route::get('/collection', CollectionController::class)->name('collection');

Route::get(
    '/inscription/{inscription:inscription_id}',
    InscriptionController::class
)->name('inscription');

Route::post('/search', SearchController::class)->name('search');
