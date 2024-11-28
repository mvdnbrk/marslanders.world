<?php

namespace App\View\Components;

use App\Enums\InscriptionRarity;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
