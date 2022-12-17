<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_services')->insert([
            [
                'name' => 'Delivery',
                'user_created_id' => 1
            ],
            [
                'name' => 'Local',
                'user_created_id' => 1
            ],
            [
                'name' => 'Pickup',
                'user_created_id' => 1
            ]
        ]);
    }
}
