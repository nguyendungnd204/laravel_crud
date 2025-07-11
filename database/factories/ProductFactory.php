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
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'quantity' => fake()->numberBetween(1, 100),
            'price' => fake()->randomFloat(2, 10, 1000),
            'image' => fake()->imageUrl() || null, // hoặc null nếu chưa dùng ảnh
            'status' => fake()->randomElement(['active', 'inactive']),
            // 'category_id' sẽ được gán từ bên ngoài
        ];
    }
}
