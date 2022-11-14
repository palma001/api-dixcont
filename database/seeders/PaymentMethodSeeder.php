<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'Efectivo',
                'user_created_id' => 1
            ],
            [
                'name' => 'Credito',
                'user_created_id' => 1
            ],
            [
                'name' => 'Debito',
                'user_created_id' => 1
            ]
        ]);
    }
}
