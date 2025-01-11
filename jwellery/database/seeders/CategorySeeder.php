<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            // Root Categories
            [
                'category_name' => 'Rings',
                'slug' => Str::slug('Rings'),
                'image' => 'images/category/category-1.jpg',
                'parent_category_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Earrings',
                'slug' => Str::slug('Earrings'),
                'image' => 'images/category/category-2.jpg',
                'parent_category_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Bracelets',
                'slug' => Str::slug('Bracelets'),
                'image' => 'images/category/category-3.jpg',
                'parent_category_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Necklaces',
                'slug' => Str::slug('Necklaces'),
                'image' => 'images/category/category-4.jpg',
                'parent_category_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Accessories',
                'slug' => Str::slug('Accessories'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Subcategories of Accessories
            [
                'category_name' => 'Watches',
                'slug' => Str::slug('Watches'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 5, // Parent is 'Accessories'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Sunglasses',
                'slug' => Str::slug('Sunglasses'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 5, // Parent is 'Accessories'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Hats',
                'slug' => Str::slug('Hats'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 5, // Parent is 'Accessories'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Subcategories of Rings
            [
                'category_name' => 'Women Rings',
                'slug' => Str::slug('Women Rings'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 1, // Parent is 'Rings'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Men Rings',
                'slug' => Str::slug('Men Rings'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 1, // Parent is 'Rings'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Subcategories of Earrings
            [
                'category_name' => 'Stud Earrings',
                'slug' => Str::slug('Stud Earrings'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 2, // Parent is 'Earrings'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Hoop Earrings',
                'slug' => Str::slug('Hoop Earrings'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 2, // Parent is 'Earrings'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Subcategories of Necklaces
            [
                'category_name' => 'Gold Necklaces',
                'slug' => Str::slug('Gold Necklaces'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 4, // Parent is 'Necklaces'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Pearl Necklaces',
                'slug' => Str::slug('Pearl Necklaces'),
                'image' => 'images/category/category-5.jpg',
                'parent_category_id' => 4, // Parent is 'Necklaces'
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
