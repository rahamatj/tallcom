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

        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                'category_id' => rand(1, 4),
                'name' => 'Product ' . $i,
                'image' => 'frontend/assets/img/gallery/latest' . rand(1, 4) . '.jpg',
                'price' => rand(50, 200),
                'description' => 'Description for product ' . $i,
                'is_trending' => rand(0, 1),
                'you_may_like' => rand(0, 1),
            ]);
        }
    }
}
