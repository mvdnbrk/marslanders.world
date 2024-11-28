<?php

namespace App\Http\Controllers;

use App\Enums\InscriptionRarity;
use App\Models\Inscription;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class CollectionController extends Controller
{
    public function __invoke(?string $rarity = null): View
    {
        $inscriptions = Inscription::query()
            ->when($rarity !== null, function ($query) use ($rarity) {
                $query->whereBetween(
                    'rank',
                    InscriptionRarity::fromSlug($rarity)->rankRange(),
                );
            })
            ->when(Route::currentRouteNamed('collection.burned'), function ($query) {
                $query->where('burned', true);
            })
            ->paginate(24);

        return view('collection', [
            'inscriptions' => $inscriptions,
            'rarity' => InscriptionRarity::fromSlug($rarity),
        ]);
    }
}
