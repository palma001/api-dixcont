<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Electrónicos', 'user_created_id' => 1],
            ['name' => 'Hogar', 'user_created_id' => 1],
            ['name' => 'Muebles', 'user_created_id' => 1],
            ['name' => 'Juguetes', 'user_created_id' => 2],
            ['name' => 'Ropa', 'user_created_id' => 2],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
