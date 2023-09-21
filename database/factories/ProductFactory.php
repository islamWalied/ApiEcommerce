<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'description' => fake()->text,
            'price' => fake()->numberBetween(10,500),
            'discount_price' => fake()->numberBetween(1,10),
            'quantity' => fake()->numberBetween(1,30),
            'category_id' => fake()->numberBetween(1,4),
        ];
    }
}
