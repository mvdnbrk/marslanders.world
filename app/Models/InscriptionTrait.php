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
}
