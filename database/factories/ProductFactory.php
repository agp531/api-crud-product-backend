<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;
use Ramsey\Uuid\Type\Integer;

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
            'name' => fake()->name(),
            'description' => fake()->text(200),
            'price' => fake()->randomFloat(2, 20, 300),
            'stock' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            'photo' => 'assets/images/no-image.png',
            
        ];
    }
}
