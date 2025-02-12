<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\InscriptionTrait;
use Illuminate\Support\Collection;
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

        $statistics = $this->getStatistics();

        return view(
            'statistics',
            compact('doge_price', 'burn_count', 'statistics')
        );
    }

    protected function getStatistics(): Collection
    {
        return InscriptionTrait::selectRaw('
            inscription_traits.type,
            inscription_traits.value,
            COUNT(*) as total_count,
            SUM(CASE WHEN inscriptions.burned = true THEN 1 ELSE 0 END) as burned_count
        ')
            ->leftJoin('inscriptions', 'inscription_traits.inscription_id', '=', 'inscriptions.id')
            ->groupBy('inscription_traits.type', 'inscription_traits.value')
            ->orderBy('inscription_traits.type')
            ->orderBy('inscription_traits.value')
            ->get()
            ->groupBy('type')
            ->flatten();
    }
}
