<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            [
                'name' => 'Dolares',
                'symbol' => '$',
                'user_created_id' => 1
            ],
            [
                'name' => 'Soles',
                'symbol' => 'S',
                'user_created_id' => 1
            ]
        ]);
    }
}
