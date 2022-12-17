<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            [
                'name' => 'IGV',
                'user_created_id' => 1
            ],
            [
                'name' => 'Op. Exonerada',
                'user_created_id' => 1
            ],
            [
                'name' => 'Op. Inafectada',
                'user_created_id' => 1
            ],
            [
                'name' => 'ISC',
                'user_created_id' => 1
            ],
            [
                'name' => 'ICBPER',
                'user_created_id' => 1
            ],
            [
                'name' => 'Otros Cargos',
                'user_created_id' => 1
            ],
            [
                'name' => 'Otros Tributos',
                'user_created_id' => 1
            ]
        ]);
    }
}
