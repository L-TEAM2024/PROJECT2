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
    public function definition()
    {
        return [
            'name' => $this->faker->word,               // Random product name
            'category_id'=>  $this->faker->randomFloat(1, 1, 2),
            'price' => $this->faker->randomFloat(2, 10, 500), // Random price between 10 and 500
        ];
    }
}
