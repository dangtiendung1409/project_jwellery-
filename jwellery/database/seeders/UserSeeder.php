<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'full_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345'),
                'thumbnail' => 'https://example.com/images/jane_doe.jpg',
                'phone_number' => '0230988237',
                'province' => 'Ha Noi',
                'district' => 'Ha Dong',
                'ward' => 'Van Quan',
                'address_detail' => 'đường 19/5',
                'account_balance' => 0,
                'role_id' => 1,
            ],
            [
                'full_name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('12345'),
                'thumbnail' => 'https://example.com/images/john_doe.jpg',
                'phone_number' => '0230988237',
                'province' => 'Ha Noi',
                'district' => 'Ha Dong',
                'ward' => 'Van Quan',
                'address_detail' => 'đường 19/5',
                'account_balance' => 0,
                'role_id' => 2,
            ],
            [
                'full_name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('12345'),
                'thumbnail' => 'https://example.com/images/john_doe.jpg',
                'phone_number' => '0230988237',
                'province' => 'Ha Noi',
                'district' => 'Ha Dong',
                'ward' => 'Van Quan',
                'address_detail' => 'đường 19/5',
                'account_balance' => 0,
                'role_id' => 2,
            ],
        ];

        // Insert users into the users table
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
