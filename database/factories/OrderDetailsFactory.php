<?php
namespace Database\Factories;

use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailsFactory extends Factory
{
    protected $model = OrderDetails::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'product_id' => Products::factory(), // Giả sử bạn có factory cho Product
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'quantity' => $this->faker->numberBetween(1, 10),
            'order_id' => Orders::factory(), // Giả sử bạn có factory cho Order
        ];
    }
}
