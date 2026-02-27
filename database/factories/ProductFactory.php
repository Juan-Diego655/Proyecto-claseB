<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'description'=> fake()->paragraph(),
            'price'=> fake()->randomFloat(2, 1, 100),
            'category_id'=> fake()->numberBetween(1, 10000),
        ];
    }
}
