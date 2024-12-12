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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 50);
            $table->string('email', 150)->unique();
            $table->string('thumbnail', 500)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('province', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('ward', 255)->nullable();
            $table->string('address_detail', 255)->nullable();
            $table->string('password', 255);
            $table->decimal('account_balance', 18, 2)->default(0);
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
