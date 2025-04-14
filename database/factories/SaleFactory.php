<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_name' => fake()->productName, 
            'description' => fake()->text, 
            'quantity' => fake()->numberBetween(1,10), 
            'price' => fake()->randomFloat(2, 5, 500),
            'payment_method' => fake()->randomElement(['cash', 'card'])


        ];
    }
}
