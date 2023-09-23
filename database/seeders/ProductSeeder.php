<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'fork',
            'description' => 'this is a fork',
            'price' => 50,
            'discount_price' => 5,
            'quantity' => 10,
            'category_id' => 3,
//            'size' => 3,
//            'color' => 5,
        ]);
        Product::create([
            'title' => 'keyboard',
            'description' => 'this is a keyboard',
            'price' => 200,
            'discount_price' => 25,
            'quantity' => 5,
            'category_id' => 2,
//            'size' => 4,
//            'color' => 6,
        ]);
        Product::create([
            'title' => 't-shirt',
            'description' => 'this is a t-shirt',
            'price' => 130,
            'discount_price' => 120,
            'quantity' => 20,
            'category_id' => 1,
//            'size' => 2,
//            'color' => 8,
        ]);
        Product::create([
            'title' => 'bike',
            'description' => 'this is a bike',
            'price' => 822,
            'discount_price' => 22,
            'quantity' => 6,
            'category_id' => 4,
//            'size' => 1,
//            'color' => 7,
        ]);
    }
}
