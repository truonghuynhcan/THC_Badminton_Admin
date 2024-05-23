<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_cate' => rand(1, 4),
            'id_user' => rand(1, 10),
            'img' => fake()->imageUrl(),
            'title' => fake()->sentence(),
            'sub_title' => fake()->sentence(),
            'date' => fake()->dateTimeThisCentury(),
            'content' => fake()->sentence(),
            'view' => rand(10, 100),
            'thumb_up' => rand(10, 100),
            'heart' => rand(10, 100),
        ];
    }
}
