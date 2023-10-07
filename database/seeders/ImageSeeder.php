<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::create([
            'image_url' => '/storage/products/product-2.jpg',
            'product_id' => 1,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => '/storage/products/product-3.jpg',
            'product_id' => 1,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => '/storage/products/product-4.jpg',
            'product_id' => 2,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => '/storage/products/product-5.jpg',
            'product_id' => 2,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => '/storage/products/product-6.jpg',
            'product_id' => 3,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => '/storage/products/product-7.jpg',
            'product_id' => 3,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => '/storage/products/product-1.jpg',
            'product_id' => 4,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
    }
}
