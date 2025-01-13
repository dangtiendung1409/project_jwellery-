<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users and products
        $users = User::all();
        $products = Product::all();

        // Ensure we have users and products
        if ($users->isEmpty() || $products->isEmpty()) {
            $this->command->error('Please ensure there are users and products in the database before seeding orders.');
            return;
        }

        // Generate 20 orders
        for ($i = 0; $i < 20; $i++) {
            // Select a random user
            $user = $users->random();

            // Generate order data
            $orderCode = strtoupper(Str::random(8)); // Example: 4GO85B46
            $secureToken = Str::uuid()->toString(); // Generate UUID
            $status = ['pending', 'complete', 'cancel', 'shipping', 'shipped', 'confirmed'][rand(0, 5)];
            $isPaid = ['paid', 'unpaid'][rand(0, 1)];
            $totalAmount = 0;

            $orderId = DB::table('orders')->insertGetId([
                'user_id' => $user->id,
                'total_amount' => 0, // Placeholder, will calculate later
                'status' => $status,
                'is_paid' => $isPaid,
                'province' => fake()->state(),
                'district' => fake()->city(),
                'ward' => fake()->word(),
                'address_detail' => fake()->address(),
                'full_name' => fake()->name(),
                'email' => fake()->email(),
                'telephone' => fake()->phoneNumber(),
                'payment_method' => ['credit_card', 'cash_on_delivery', 'paypal'][rand(0, 2)],
                'shipping_method' => ['standard', 'express'][rand(0, 1)],
                'cancel_reason' => null,
                'order_code' => $orderCode,
                'secure_token' => $secureToken,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add order details
            $productsForOrder = $products->random(rand(1, 5)); // Select 1-5 random products
            foreach ($productsForOrder as $product) {
                $qty = rand(1, 10);
                $price = $product->price;
                $totalAmount += $qty * $price;

                DB::table('order_details')->insert([
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'price' => $price,
                    'qty' => $qty,
                    'status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Update total amount for the order
            DB::table('orders')->where('id', $orderId)->update(['total_amount' => $totalAmount]);
        }
    }
}
