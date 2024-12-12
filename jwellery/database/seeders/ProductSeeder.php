<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Danh sách tên ảnh có sẵn
        $imageNames = [];
        for ($k = 1; $k <= 150; $k++) {
            $imageNames[] = 'images/products/product-' . $k . '.jpg';
        }

        // Lấy tất cả ID từ bảng categories
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        // Danh sách tên sản phẩm liên quan đến trang sức đá quý
        $productNames = [
            'Diamond Solitaire Ring', 'Ruby Pendant Necklace', 'Emerald Cut Earrings',
            'Sapphire Cluster Bracelet', 'Topaz Drop Earrings', 'Amethyst Tennis Bracelet',
            'Citrine Cocktail Ring', 'Peridot Beaded Necklace', 'Garnet Stud Earrings',
            'Aquamarine Halo Ring', 'Morganite Pendant Necklace', 'Tanzanite Eternity Band',
            'Opal Pendant Necklace', 'Turquoise Beaded Bracelet', 'Spinel Cluster Ring',
            'Quartz Charm Necklace', 'Zircon Hoop Earrings', 'Alexandrite Solitaire Ring',
            'Tourmaline Pendant Necklace', 'Moonstone Stud Earrings', 'Carnelian Signet Ring',
            'Onyx Bar Necklace', 'Labradorite Drop Earrings', 'Malachite Cuff Bracelet',
            'Jade Beaded Necklace', 'Amber Pendant Necklace', 'Coral Drop Earrings',
            'Lapis Lazuli Statement Ring', 'Chalcedony Stud Earrings', 'Citrine Bar Necklace',
            'Kyanite Link Bracelet', 'Hematite Pendant Necklace', 'Smoky Quartz Hoop Earrings',
            'Rose Quartz Cluster Necklace', 'Blue Topaz Tennis Bracelet', 'Black Diamond Stud Earrings',
            'White Sapphire Solitaire Ring', 'Pink Sapphire Eternity Band', 'Yellow Diamond Pendant Necklace',
            'Green Sapphire Halo Ring', 'Fancy Topaz Cocktail Ring', 'Cognac Quartz Drop Necklace',
            'Fire Opal Stud Earrings', 'Star Ruby Signet Ring', 'Watermelon Tourmaline Necklace',
            'Bi-Color Topaz Earrings', 'Dendritic Agate Pendant', 'Rutilated Quartz Ring',
            'Iolite Bar Bracelet', 'Tsavorite Garnet Ring', 'Fancy Zircon Hoop Earrings',
            'Pink Opal Cuff Bracelet', 'Blue Sapphire Choker Necklace', 'Fancy Amber Drop Earrings',
            'Pink Diamond Eternity Band', 'White Gold Diamond Ring', 'Platinum Ruby Necklace',
            'Silver Opal Pendant', 'Gold Tanzanite Earrings', 'Yellow Gold Sapphire Ring',
            'Rose Gold Morganite Necklace', 'Diamond-Studded Bracelet', 'Triple Stone Emerald Ring',
            'Vintage Ruby Necklace', 'Art Deco Sapphire Earrings', 'Classic Diamond Halo Ring',
            'Minimalist Garnet Pendant', 'Custom Aquamarine Necklace', 'Birthstone Emerald Ring',
            'Celtic Sapphire Band', 'Personalized Ruby Locket', 'Infinity Diamond Bracelet',
            'Ethnic Jade Necklace', 'Nature-Inspired Topaz Ring', 'Heirloom Opal Earrings',
            'Royal Tanzanite Pendant', 'Baroque Pearl Necklace', 'Geometric Citrine Bracelet',
            'Floral Rose Quartz Ring', 'Boho Moonstone Necklace', 'Elegant Alexandrite Earrings',
            'Statement Garnet Ring', 'Contemporary Malachite Necklace', 'Vintage Amber Bracelet',
            'Luxury Ruby Bangle', 'Exclusive Sapphire Ring', 'High-End Diamond Pendant',
            'Designer Tanzanite Necklace', 'Bridal Emerald Earrings', 'Antique Opal Locket'
        ];
        $types = ['Necklace', 'Earring', 'Ring', 'Bracelet', 'Pendant', 'Brooch', 'Charm', 'Cuff', 'Anklet', 'Choker'];
        $descriptions = [
            'Elegant and timeless design.',
            'Perfect for any occasion.',
            'A symbol of love and beauty.',
            'Crafted with precision and care.',
            'Adds a touch of luxury to your outfit.',
            'Designed for modern elegance.',
            'Inspired by classic artistry.',
            'A treasure to last a lifetime.',
            'Lightweight and comfortable to wear.',
            'Makes a thoughtful gift for someone special.'
        ];
        $products = [];
        $productImages = [];

        // Tạo 300 sản phẩm
        for ($i = 1; $i <= 300; $i++) {
            $productName = $productNames[array_rand($productNames)];

            // Tạo dữ liệu cho bảng 'products'
            $products[] = [
                'product_name' => $productName,
                'slug' => Str::slug($productName . '-' . Str::random(5)), // Slug với mã ngẫu nhiên
                'price' => rand(100, 600),
                'description' => $descriptions[array_rand($descriptions)],
                'product_code' => 'ADARA_' . rand(100000, 999999),
                'qty' => rand(1, 100),
                'category_id' => $categoryIds[array_rand($categoryIds)], // Random từ danh sách category IDs
                'type' => $types[array_rand($types)],
                'stone_type' => ['None', 'Diamond', 'Ruby', 'Sapphire'][rand(0, 3)],
                'color' => ['Gold', 'Silver', 'Rose Gold'][rand(0, 2)],
                'material' => ['Gold 18K', 'Silver 925', 'Platinum'][rand(0, 2)],
                'gender' => ['Unisex', 'Male', 'Female'][rand(0, 2)],
                'finish_quality' => ['High Polish', 'Matte Finish', 'Satin Finish'][rand(0, 2)],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Tạo từ 3 đến 5 hình ảnh cho mỗi sản phẩm
            $numberOfImages = rand(3, 5);
            $usedImages = []; // Mảng lưu trữ các hình ảnh đã sử dụng để tránh trùng lặp

            for ($j = 0; $j < $numberOfImages; $j++) {
                // Chọn ngẫu nhiên một tên ảnh chưa được sử dụng
                do {
                    $randomImage = $imageNames[array_rand($imageNames)];
                } while (in_array($randomImage, $usedImages));

                $usedImages[] = $randomImage; // Thêm vào danh sách đã sử dụng

                $productImages[] = [
                    'product_id' => $i,
                    'image_path' => $randomImage,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Chèn dữ liệu vào bảng 'products'
        DB::table('products')->insert($products);

        // Chèn dữ liệu vào bảng 'product_images'
        DB::table('product_images')->insert($productImages);
    }
}
