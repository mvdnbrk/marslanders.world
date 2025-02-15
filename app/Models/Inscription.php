<?php

namespace App\Models;

use App\Enums\InscriptionRarity;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'inscription_id',
        'owner',
        'name',
        'rank',
        'hash',
    ];

    protected $hidden = [
        'hash',
    ];

    protected function casts(): array
    {
        return [
            'burned' => 'boolean',
        ];
    }

    public function isBurned(): bool
    {
        return $this->burned;
    }

    public function rarity(): InscriptionRarity
    {
        return match (true) {
            $this->rank < 200 => InscriptionRarity::VERYRARE,
            $this->rank < 1000 => InscriptionRarity::RARE,
            $this->rank < 2500 => InscriptionRarity::UNCOMMON,
            default => InscriptionRarity::COMMON,
        };
    }

    protected function getInternalCollectionId(): int
    {
        return (int) Str::of($this->name)
            ->trim()
            ->after('#')
            ->__toString();
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::of('https://cdn.marslanders.world/images/inscription/')
                ->append($this->getInternalCollectionId())
                ->append('_500_')
                ->append($this->hash)
                ->append('.webp')
        );
    }

    public function traits(): HasMany
    {
        return $this->hasMany(InscriptionTrait::class);
    }
}
