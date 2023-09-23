<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::create([
           'size' => 'xxxxl'
        ]);
        Size::create([
            'size' => 'xxxl'
        ]);
        Size::create([
            'size' => 'xxl'
        ]);
        Size::create([
            'size' => 'xl'
        ]);
        Size::create([
            'size' => 'L'
        ]);
        Size::create([
            'size' => 'M'
        ]);
        Size::create([
            'size' => 'S'
        ]);
    }
}
