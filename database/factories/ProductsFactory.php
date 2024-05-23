<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    protected $model = Products::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'sale' => $this->faker->randomFloat(2, 5, 500),
            'description' => $this->faker->sentence(),
            'detail' => $this->faker->paragraph(),
            'status' => $this->faker->numberBetween(0, 1),
            'category_id' => \App\Models\Categories::factory(),
        ];
    }
}
