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
                'name' => 'Boleta de venta electronica',
                'acronym_serie' => 'B',
                'user_created_id' => 1
            ],
            [
                'name' => 'Ticket',
                'acronym_serie' => 'T',
                'user_created_id' => 1
            ]
        ]);
    }
}
