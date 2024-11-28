<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Enums\InscriptionRarity;
use Illuminate\Contracts\View\View;

class NavRarity extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View
    {
        $rarities = InscriptionRarity::cases();

        return view(
            'components.nav-rarity',
            compact('rarities'),
        );
    }
}
