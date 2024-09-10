<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marslander>
 */
class MarslanderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => 10,
            'rank' => 99,
            'inscription_id' => 'd69deae6e29207fbc1b46a7a878ad631f790aadc3b5d00da4b9960c371eeae62i0',
            'hash' => 'a059257c',
            'created' => now(),
            'updated' => now(),
        ];
    }
}
