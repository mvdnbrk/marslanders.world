<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum InscriptionRarity
{
    case VERYRARE;
    case RARE;
    case UNCOMMON;
    case COMMON;

    public static function slugs(): array
    {
        return array_map(
            'strtolower',
            array_map(fn ($case) => $case->name, self::cases())
        );
    }

    public static function fromSlug(?string $slug): ?self
    {
        return Collection::make(self::cases())
            ->first(
                fn ($case) => strtolower($slug) === strtolower($case->name)
            );
    }

    public function rankRange(): array
    {
        return match ($this) {
            self::VERYRARE => [1, 200],
            self::RARE => [201, 1000],
            self::UNCOMMON => [1001, 2500],
            self::COMMON => [2501, 10000],
            default => [1, 10000],
        };
    }

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
