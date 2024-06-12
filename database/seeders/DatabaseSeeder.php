<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductImageSeeder;
use Monolog\Handler\RollbarHandler;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'Pham Ngoc Lang',
            'email' => 'langpn.dev@gmail.com',
            'password' => bcrypt('526488'),
            'role' => 'admin',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            Category::create([
                'name' => fake()->word(),
                'icon' => fake()->imageUrl(640, 480, 'categories', true),
            ]);
        }

        Product::factory(100)->create();

        $this->call([
            ProductImageSeeder::class,
        ]);
    }
}
