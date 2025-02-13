<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class InscriptionTrait extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected array $backgroundHexColors = [
        'darkblue' => '#2F2B60',
        'darkred' => '#602C2B',
        'darkturquoise' => '#2B5B5D',
        'lightblue' => '#28DFF8',
        'oceanblue' => '#2B4460',
        'orange' => '#F98128',
        'red' => '#F8283C',
    ];

    public static function getTypes(): Collection
    {
        return static::select('type')
            ->groupBy('type')
            ->orderBy('type')
            ->pluck('type');
    }

    public static function getTypesAndValues(): Collection
    {
        return static::groupBy('type', 'value')
            ->orderBy('type')
            ->get()
            ->groupBy('type')
            ->map(function ($values) {
                return $values->pluck('value')->values();
            });
    }

    public static function getValuesForType(string $type): Collection
    {
        return static::getTypesAndValues()->get($type, Collection::make());
    }
}
