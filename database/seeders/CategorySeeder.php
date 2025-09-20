<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Men',
            'image' => 'frontend/assets/img/gallery/items1.jpg',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Women',
            'image' => 'frontend/assets/img/gallery/items2.jpg',
            'is_featured' => true,
        ]);

        Category::create([
            'name' => 'Baby',
            'image' => 'frontend/assets/img/gallery/items3.jpg',
            'is_featured' => true,
        ]);
    }
}
