<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            [
                'name' => 'Mesa numero 1',
                'user_created_id' => 1,
                'living_room_id' => 1
            ],
            [
                'name' => 'Mesa numero 2',
                'user_created_id' => 1,
                'living_room_id' => 1
            ],
            [
                'name' => 'Mesa numero 3',
                'user_created_id' => 1,
                'living_room_id' => 1
            ]
        ]);
    }
}
