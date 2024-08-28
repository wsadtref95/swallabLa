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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('r_id')->constrained('restaurants')->onDelete('cascade'); // 關聯到 restaurants 表
            $table->decimal('class',10,0);
            $table->string('meals_name'); // 餐點名稱
            $table->decimal('price', 8, 0); // 餐點價格
            $table->string('photo')->nullable(); // 餐點照片
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
