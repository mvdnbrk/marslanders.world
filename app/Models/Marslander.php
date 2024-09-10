<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marslander extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $primaryKey = 'inscription_id';

    protected $hidden = [
        'hash',
    ];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => 'https://cdn.marslanders.world/images/inscription/'.$this->id.'_500_'.$this->hash.'.webp',
        );
    }
}
