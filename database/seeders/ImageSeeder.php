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
            'image_url' => 'image_url.jpg',
            'product_id' => 1,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => 'image_url.jpg',
            'product_id' => 1,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => 'image1_url.jpg',
            'product_id' => 2,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => 'image2_url.jpg',
            'product_id' => 2,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => 'image3_url.jpg',
            'product_id' => 3,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => 'image4_url.jpg',
            'product_id' => 3,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
        Image::create([
            'image_url' => 'image5_url.jpg',
            'product_id' => 3,
//            'caption' => 'hello body',
//            'alt_text' => 'this is alt text',
            'is_primary' => 1,
//            'file_size' => '5460',
//            'file_type' => 'png;',
        ]);
    }
}
