<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlockFactory extends Factory
{
    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'user_id' => fake()->numberBetween(1, 10),
            'data' => json_encode(['foo' => 'bar'])
        ];
    }
}
