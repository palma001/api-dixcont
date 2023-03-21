<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $companies = [
            [
                'name' => 'ACME Inc.',
                'document_number' => '123456789',
                'email' => 'contact@acme.com',
                'phone_number' => '555-123-4567',
                'address' => '123 Main St.',
                'user_created_id' => 1
            ],
            [
                'name' => 'Widget Co.',
                'document_number' => '987654321',
                'email' => 'info@widgetco.com',
                'phone_number' => '555-987-6543',
                'address' => '456 Elm St.',
                'user_created_id' => 1
            ],
            [
                'name' => 'Global Corp.',
                'document_number' => '555555555',
                'email' => 'info@globalcorp.com',
                'phone_number' => '555-555-5555',
                'address' => '789 Oak St.',
                'user_created_id' => 1
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
