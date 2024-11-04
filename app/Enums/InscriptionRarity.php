<?php

namespace App\Enums;

enum InscriptionRarity: string
{
    case VERYRARE = 'Very Rare';
    case RARE = 'Rare';
    case UNCOMMON = 'Uncommon';
    case COMMON = 'Common';

    public function styles(): string
    {
        return match($this) {
            self::VERYRARE => 'text-rose-700',
            self::RARE => 'text-amber-600',
            self::UNCOMMON => 'text-green-800',
            self::COMMON => 'text-zinc-700',
            default => '',
        };
    }
}
