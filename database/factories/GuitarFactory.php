<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GuitarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'nama gitar',
            'model' => fake()->bothify('??-###'),
            'category_id' => fake()->randomElement([1, 2, 3]),
            'description' => fake()->sentence(),
            'price' => fake()->randomNumber(6, true),
        ];
    }
}
