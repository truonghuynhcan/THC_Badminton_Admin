<?php
namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    protected $model = Orders::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->numerify('##########'), // 10 ký tự số
            'address' => $this->faker->address,
            'payment_method' => $this->faker->randomElement(['card', 'credit card']),
            'buy_date' => $this->faker->dateTime,
            'status' => $this->faker->numberBetween(0, 1), // Giả sử 0 là chưa xử lý, 1 là đã xử lý
            'user_id' => \App\Models\Users::factory(), // Giả sử bạn có factory cho User
        ];
    }
}
