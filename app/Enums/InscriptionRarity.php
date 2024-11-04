<?php

namespace App\Enums;

enum InscriptionRarity
{
    case VERYRARE;
    case RARE;
    case UNCOMMON;
    case COMMON;

    public function name(): string
    {
        return match ($this) {
            self::VERYRARE => 'Very Rare',
            self::RARE => 'Rare',
            self::UNCOMMON => 'Uncommon',
            self::COMMON => 'Common',
            default => 'Rarity Not Found',
        };
    }

    public function styles(): string
    {
        return match ($this) {
            self::VERYRARE => 'text-rose-700',
            self::RARE => 'text-amber-600',
            self::UNCOMMON => 'text-green-800',
            self::COMMON => 'text-zinc-700',
            default => '',
        };
    }
}
