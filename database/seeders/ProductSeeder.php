<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\Tag;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $categories = Category::whereNotNull('parent_id')->pluck('id');

        for ($i = 1; $i <= 1000; $i++) {
            $products[] = [
                'name' => $faker->sentence(2, true),
                'description' => $faker->paragraph,
                'category_id' => $categories->random(),
                'featured' => rand(0, 1),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $chunks = array_chunk($products, 100);
        foreach ($chunks as $chunk) {
            Product::insert($chunk);
        }
    }
}
