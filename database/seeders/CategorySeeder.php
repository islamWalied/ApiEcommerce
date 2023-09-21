<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'clothes',
            'description' => 'this is a category for clothes',
        ]);
        Category::create([
            'name' => 'computers',
            'description' => 'this is a category for computers',
        ]);
        Category::create([
            'name' => 'handmade',
            'description' => 'this is a category for handmade',
        ]);
        Category::create([
            'name' => 'bikes',
            'description' => 'this is a category for bikes',
        ]);

    }
}
