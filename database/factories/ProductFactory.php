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
            "title" => fake()->word(),
            "brand" => fake()->word(),
            "price" => fake()->randomNumber(3,false),
            "discount_price" => fake()->randomNumber(3,false),
            "image" => fake()->imageUrl(640,480,'animals',true),
            "description" => fake()->paragraph(),
            "category_id" => fake()->numberBetween(1,100),
        ];
    }
}
