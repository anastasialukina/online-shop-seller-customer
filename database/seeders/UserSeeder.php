<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Seller User 1',
                'email' => 'seller@itsolutionstuff.com',
                'email_verified_at' => now(),
                'role' => 'seller',
                'phone' => '+12345678333',
                'address' => 'Seller 1 Address',
                'status' => 'active',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Customer User 1',
                'email' => 'customer@itsolutionstuff.com',
                'email_verified_at' => now(),
                'role' => 'customer',
                'phone' => '+1544567890',
                'address' => 'Customer 1 Address',
                'status' => 'active',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Customer User 2',
                'email' => 'customer2@itsolutionstuff.com',
                'email_verified_at' => now(),
                'role' => 'customer',
                'phone' => '+1234567890',
                'address' => 'Customer 2 Address',
                'status' => 'active',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Seller User 2',
                'email' => 'seller2@itsolutionstuff.com',
                'email_verified_at' => now(),
                'role' => 'seller',
                'phone' => '1234567890',
                'address' => 'Seller 2 Address',
                'status' => 'active',
                'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
