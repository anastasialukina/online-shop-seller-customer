<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\UsersProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make seeders for sellers and products
        $sellers = User::where('role', 'seller')->get();

        foreach ($sellers as $seller) {
            UsersProduct::query()->create([
                'user_id' => $seller->id,
                'product_id' => Product::find(rand(1, 5))->id,

                //random type new or used
                'type' => rand(0, 1) ? 'new' : 'used',
            ]);
        }
    }
}
