<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $product = new Product([
                'name' => $faker->words(2, true),
                'price' => $faker->randomFloat(2, 1, 1000),
                'barcode' => $faker->ean13,
                'user_created_id' => 1,
            ]);

            $category = Category::inRandomOrder()->first();
            $product->category()->associate($category);
            $product->save();
        }
    }
}
