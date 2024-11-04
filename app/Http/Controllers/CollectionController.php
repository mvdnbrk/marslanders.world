<?php

namespace App\Http\Controllers;

use App\Enums\InscriptionRarity;
use App\Models\Inscription;
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
            ->paginate(24);

        return view('collection', [
            'inscriptions' => $inscriptions,
            'rarity' => InscriptionRarity::fromSlug($rarity),
        ]);
    }
}
