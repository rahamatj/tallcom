<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
           'category_id' => 1,
           'name' => 'Cashmere Tank + Bag',
           'image' => 'frontend/assets/img/gallery/latest1.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest2.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest3.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest4.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest1.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest2.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest3.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest4.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest1.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest2.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest3.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest4.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest1.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest2.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest3.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Cashmere Tank + Bag',
            'image' => 'frontend/assets/img/gallery/latest4.jpg',
            'price' => 120.00,
            'description' => 'A stylish cashmere tank paired with a chic bag, perfect for any occasion.',
            'is_trending' => true,
            'you_may_like' => false,
        ]);
    }
}
