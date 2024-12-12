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
            $table->string('product_name', 150);
            $table->string('slug', 255)->unique();
            $table->decimal('price', 14, 2);
            $table->string('product_code', 50)->unique()->nullable();
            $table->string('description', 255)->nullable();
            $table->integer('qty')->default(0);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('type', 125)->nullable();
            $table->string('stone_type', 100)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('material', 255)->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('finish_quality', 100)->nullable();
            $table->softDeletes();
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
