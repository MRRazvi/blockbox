<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserMetaFactory extends Factory
{
    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'user_id' => fake()->numberBetween(1, 10),
            'meta_key' => 'foo',
            'meta_value' => 'bar'
        ];
    }
}
