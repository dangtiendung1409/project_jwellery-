<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users and products
        $users = User::all();
        $products = Product::all();

        // Generate cart entries for each user
        foreach ($users as $user) {
            // Randomly select a product and quantity for each user
            $product = $products->random();
            $qty = rand(1, 5); // Random quantity between 1 and 5
            $total = $product->price * $qty; // Assuming product has a 'price' attribute

            // Insert a new cart record
            DB::table('carts')->insert([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'qty' => $qty,
                'total' => $total,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
