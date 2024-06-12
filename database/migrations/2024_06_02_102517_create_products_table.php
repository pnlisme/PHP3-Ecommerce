<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255); // Giới hạn độ dài
            $table->unsignedInteger('price'); // Chỉ dùng số dương
            $table->unsignedInteger('price_fake')->nullable(); // Có thể null
            $table->unsignedInteger('quantity')->default(0); // Số lượng mặc định là 0
            $table->text('description')->nullable(); // Mô tả có thể dài và có thể null
            $table->text('content')->nullable(); // Nội dung có thể dài và có thể null
            $table->boolean('status')->default(1); // Trạng thái mặc định là 1
            $table->unsignedInteger('view')->default(0); // Số lượt xem mặc định là 0
            $table->unsignedFloat('rating')->default(0); // Đánh giá mặc định là 0
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            // $table->foreignId('user_id')->constrained()->restrictOnDelete();
            // $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
