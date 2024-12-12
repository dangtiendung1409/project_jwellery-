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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('order_date');
            $table->double('total_amount');
            $table->string('status', 255);
            $table->string('is_paid', 255);
            $table->string('province', 255);
            $table->string('district', 255);
            $table->string('ward', 255);
            $table->string('address_detail', 255);
            $table->string('full_name', 255);
            $table->string('email', 255);
            $table->string('telephone', 20);
            $table->string('payment_method', 255);
            $table->string('shipping_method', 255);
            $table->string('cancel_reason', 255)->nullable();
            $table->string('order_code', 255)->unique();
            $table->string('secure_token', 255)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
