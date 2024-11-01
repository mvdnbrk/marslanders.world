<?php

namespace App\Models;

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
        'name',
        'rank',
        'hash',
    ];

    protected $hidden = [
        'hash',
    ];

    public function rarityLabel(): string
    {
        if ($this->rank < 200) {
            return 'Very Rare';
        }

        if ($this->rank < 1000) {
            return 'Rare';
        }

        if ($this->rank < 1000) {
            return 'UnCommon';
        }

        return 'Common';
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
