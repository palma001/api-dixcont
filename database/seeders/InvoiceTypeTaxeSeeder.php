<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceTypeTaxeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_type_tax')
            ->insert([
                [
                    'taxe_id' => 1,
                    'invoice_type_id' => 1,
                    'amount' => 10
                ],
                [
                    'taxe_id' => 2,
                    'invoice_type_id' => 1,
                    'amount' => 0
                ],
                [
                    'taxe_id' => 3,
                    'invoice_type_id' => 1,
                    'amount' => 0
                ],
                [
                    'taxe_id' => 4,
                    'invoice_type_id' => 1,
                    'amount' => 0
                ],
                [
                    'taxe_id' => 5,
                    'invoice_type_id' => 1,
                    'amount' => 0
                ],
                [
                    'taxe_id' => 6,
                    'invoice_type_id' => 1,
                    'amount' => 0
                ],
                [
                    'taxe_id' => 7,
                    'invoice_type_id' => 1,
                    'amount' =>  0
                ]
            ]);
    }
}
