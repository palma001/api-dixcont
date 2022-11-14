<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Super Administrador',
                'acronym' => 'SAM',
                'user_created_id' => 1
            ],
            [
                'name' => 'Vendedor',
                'acronym' => 'SEL',
                'user_created_id' => 1
            ],
            [
                'name' => 'Cliente',
                'acronym' => 'CLI',
                'user_created_id' => 1
            ]
        ]);
    }
}
