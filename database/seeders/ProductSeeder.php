<?php

namespace Database\Seeders;

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
        DB::table('products')->insert([
            [
                'name' => 'Refresco',
                'category_id' => 1,
                'price' => 200,
                'user_created_id' => 1
            ],
            [
                'name' => 'Homburguesa',
                'category_id' => 2,
                'price' => 400,
                'user_created_id' => 1
            ],
            [
                'name' => 'Perro caliente',
                'category_id' => 2,
                'price' => 500,
                'user_created_id' => 1
            ]
        ]);
    }
}
