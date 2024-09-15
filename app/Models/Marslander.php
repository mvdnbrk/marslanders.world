<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Marslander extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $primaryKey = 'inscription_id';

    protected $hidden = [
        'hash',
    ];

    protected function getInternalCollectionId(): int
    {
        return (int) Str::of($this->name)->after('#')->__toString();
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => 'https://cdn.marslanders.world/images/inscription/'
                .$this->getInternalCollectionId().'_500_'
                .$this->hash.
                '.webp',
        );
    }
}
