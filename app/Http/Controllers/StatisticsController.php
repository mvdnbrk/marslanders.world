<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\InscriptionTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Number;
use Illuminate\View\View;

class StatisticsController extends Controller
{
    public function __invoke(): View
    {
        $doge_price = Number::format(
            Cache::get('doge_price', 0),
            maxPrecision: 4
        );

        $burn_count = Inscription::where('burned', true)->count();

        $statistics = InscriptionTrait::getStatistics();

        return view(
            'statistics',
            compact('doge_price', 'burn_count', 'statistics')
        );
    }
}
