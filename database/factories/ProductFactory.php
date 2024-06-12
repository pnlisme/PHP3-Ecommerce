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
    public function definition(): array
    {
        return [
            'name' => fake()->text(random_int(20, 30)),
            'price' => fake()->numberBetween(100, 10000), // Giá ngẫu nhiên từ 100 đến 10000
            'price_fake' => fake()->numberBetween(100, 10000), // Giá giảm ngẫu nhiên từ 100 đến 10000
            'quantity' => fake()->numberBetween(1, 100), // Số lượng ngẫu nhiên từ 1 đến 100
            'description' => fake()->paragraph, // Đoạn mô tả ngẫu nhiên
            'content' => fake()->paragraph(100), // Nội dung ngẫu nhiên
            'status' => fake()->randomElement([0, 1]), // Trạng thái ngẫu nhiên 0 hoặc 1
            'view' => fake()->numberBetween(0, 1000), // Số lượt xem ngẫu nhiên từ 0 đến 1000
            'rating' => fake()->randomFloat(1, 0, 5), // Đánh giá ngẫu nhiên từ 0 đến 5
            'category_id' => fake()->numberBetween(1, 5), // ID danh mục ngẫu nhiên từ 1 đến 10
        ];
    }
}
