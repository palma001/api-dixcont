<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_types')->insert([
            [
                'name' => 'Delivery',
                'acronym_serie' => 'DEL',
                'user_created_id' => 1
            ],
            [
                'name' => 'Local',
                'acronym_serie' => 'LOC',
                'user_created_id' => 1
            ],
            [
                'name' => 'Pickup',
                'acronym_serie' => 'PIC',
                'user_created_id' => 1
            ]
        ]);
    }
}
