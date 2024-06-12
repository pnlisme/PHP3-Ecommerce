<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = \App\Models\Product::all();

        foreach ($products as $product) {
            $quantity = random_int(4, 7);

            for ($i = 0; $i < $quantity; $i++) {
                ProductImage::factory()->create([
                    'name' => fake()->imageUrl(640, 480, 'products', true),
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
