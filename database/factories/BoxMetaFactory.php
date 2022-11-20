<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BoxMetaFactory extends Factory
{
    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'box_id' => fake()->numberBetween(1, 10),
            'meta_key' => 'foo',
            'meta_value' => 'bar'
        ];
    }
}
