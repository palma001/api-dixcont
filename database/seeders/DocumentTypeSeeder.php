<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')
            ->insert([
                [
                    'name' => 'Docuemnto de identidad',
                    'short_name' => 'DNI',
                    'description' => 'Docuemnto de identidad',
                ],
                [
                    'name' => 'Persona juridica',
                    'short_name' => 'RUC',
                    'description' => 'Persona juridica',
                ],
                [
                    'name' => 'CUIT',
                    'short_name' => 'CUIT',
                    'description' => 'CUIT',
                ],
                [
                    'name' => 'CUIL',
                    'short_name' => 'CUIL',
                    'description' => 'CUIL',
                ]
            ]);
    }
}
