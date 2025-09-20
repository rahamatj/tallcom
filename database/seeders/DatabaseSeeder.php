<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('12345678'),
        ]);

        Category::factory()->create([
            'name' => 'Men',
        ]);

        Category::factory()->create([
            'name' => 'Women',
        ]);

        Category::factory()->create([
            'name' => 'Baby',
        ]);

        Product::factory(10)->create();
    }
}
