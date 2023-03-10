<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'Product 1 Description',
                'price' => 100,
                'image' => 'product1.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Product 2',
                'description' => 'Product 2 Description',
                'price' => 200,
                'image' => 'product2.jpg',
                'status' => 'active',

            ],
            [
                'name' => 'Product 3',
                'description' => 'Product 3 Description',
                'price' => 300,
                'image' => 'product3.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Product 4',
                'description' => 'Product 4 Description',
                'price' => 400,
                'image' => 'product4.jpg',
                'status' => 'active',
            ],
            [
                'name' => 'Product 5',
                'description' => 'Product 5 Description',
                'price' => 500,
                'image' => 'product5.jpg',
                'status' => 'active',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
