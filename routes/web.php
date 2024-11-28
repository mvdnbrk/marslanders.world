<?php

use App\Enums\InscriptionRarity;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomepageController::class)
    ->name('home');

Route::get('/collection', CollectionController::class)
    ->name('collection');

Route::get('/collection/burned', CollectionController::class)
    ->name('collection.burned');

Route::get('/collection/{rarity}', CollectionController::class)
    ->whereIn('rarity', InscriptionRarity::slugs())
    ->name('collection.rarity');

Route::get(
    '/inscription/{inscription:inscription_id}',
    InscriptionController::class
)
    ->name('inscription');

Route::post('/search', SearchController::class)
    ->name('search');
