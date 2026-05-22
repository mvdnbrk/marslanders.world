<?php

namespace Database\Factories;

use App\Models\Marslander;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Marslander>
 */
class InscriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => 10,
            'name' => 'Mars Landers #10',
            'inscription_id' => 'd69deae6e29207fbc1b46a7a878ad631f790aadc3b5d00da4b9960c371eeae62i0',
            'rank' => 99,
            'hash' => 'a059257c',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
