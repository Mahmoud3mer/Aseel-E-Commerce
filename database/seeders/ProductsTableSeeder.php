<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Sample Product 1',
                'description' => 'This is a description for Sample Product 1.',
                'quantity' => 100,
                'price' => 29.99,
                'image_path' => 'assets/img/products/product-img-1.jpg',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Product 2',
                'description' => 'This is a description for Sample Product 2.',
                'quantity' => 50,
                'price' => 49.99,
                'image_path' => 'assets/img/products/product-img-2.jpg',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Product 3',
                'description' => 'This is a description for Sample Product 3.',
                'quantity' => 75,
                'price' => 19.99,
                'image_path' => 'assets/img/products/product-img-3.jpg',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Product 4',
                'description' => 'This is a description for Sample Product 4.',
                'quantity' => 60,
                'price' => 39.99,
                'image_path' => 'assets/img/products/product-img-4.jpg',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Product 5',
                'description' => 'This is a description for Sample Product 5.',
                'quantity' => 80,
                'price' => 59.99,
                'image_path' => 'assets/img/products/product-img-5.jpg',
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Product 6',
                'description' => 'This is a description for Sample Product 6.',
                'quantity' => 90,
                'price' => 69.99,
                'image_path' => 'assets/img/products/product-img-6.jpg',
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Product 7',
                'description' => 'This is a description for Sample Product 7.',
                'quantity' => 40,
                'price' => 89.99,
                'image_path' => 'assets/img/products/product-img-5.jpg',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Product 8',
                'description' => 'This is a description for Sample Product 8.',
                'quantity' => 30,
                'price' => 99.99,
                'image_path' => 'assets/img/products/product-img-4.jpg',
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // Add more products as needed
        ]);
    }
}
