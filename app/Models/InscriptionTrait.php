<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class InscriptionTrait extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function inscription(): BelongsTo
    {
        return $this->belongsTo(Inscription::class);
    }

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

    public static function getStatistics(): Collection
    {
        $burn_count = Inscription::where('burned', true)->count();

        return self::selectRaw('
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
            ->map(function ($item) use ($burn_count) {
                $denominator = 10000 - $burn_count;
                $percentage = $denominator > 0 ? (($item->total_count - $item->burned_count) / $denominator) * 100 : 0;

                $item->percentage = round($percentage, 2);
                $item->alive = $item->total_count - $item->burned_count;

                return $item;
            })
            ->groupBy('type')
            ->flatten();
    }
}
