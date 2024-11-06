<?php

namespace App\View\Components;

use App\Enums\InscriptionRarity;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RarityNavigation extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View
    {
        $rarities = InscriptionRarity::cases();

        return view(
            'components.rarity-navigation',
            compact('rarities'),
        );
    }
}
