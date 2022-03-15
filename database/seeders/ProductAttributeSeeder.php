<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $products = Product::pluck('id');

        for ($i = 1; $i <= 1000; $i++) {
            $products_attr[] = [
                'product_id' => $products->random(),
                'price' => $faker->numberBetween(5, 200),
                'stock' => $faker->numberBetween(10, 100),
                'size' => $faker->randomElement(['xs','s','m','l','xl','2xl','3xl']),
                'color' => $faker->randomElement(['red','blue','green','yellow','black','white']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $chunks = array_chunk($products_attr, 100);
        foreach ($chunks as $chunk) {
            ProductAttribute::insert($chunk);
        }
    }
}
