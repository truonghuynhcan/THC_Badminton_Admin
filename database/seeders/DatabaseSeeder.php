<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\NewsCate::factory(5)->create();
        // \App\Models\News::factory(20)->create();
        \App\Models\Users::factory(10)->create();
        \App\Models\Categories::factory(5)->create();
        \App\Models\Products::factory()->count(50)->create();
        \App\Models\Orders::factory()->count(50)->create();
        \App\Models\OrderDetails::factory()->count(50)->create();
    }
}
