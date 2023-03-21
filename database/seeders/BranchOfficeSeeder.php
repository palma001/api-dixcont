<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\BranchOffice;

class BranchOfficeSeeder extends Seeder
{
    public function run()
    {
        $branchOffices = [
            [
                'name' => 'ACME Branch 1',
                'phone_number' => '555-555-1234',
                'address' => '321 Broadway',
                'email' => 'acmeb1@gmail.com',
                'company_id' => 1,
                'user_created_id' => 1
            ],
            [
                'name' => 'ACME Branch 2',
                'phone_number' => '555-555-5678',
                'address' => '456 Main St.',
                'email' => 'acmeb2@gmail.com',
                'company_id' => 1,
                'user_created_id' => 1
            ],
            [
                'name' => 'Widget Co. Branch 1',
                'phone_number' => '555-123-4567',
                'address' => '789 Elm St.',
                'email' => 'widgetb1@gmail.com',
                'company_id' => 2,
                'user_created_id' => 1
            ],
            [
                'name' => 'Global Corp. Branch 1',
                'phone_number' => '555-987-6543',
                'address' => '123 Oak St.',
                'email' => 'globalb1@gmail.com',
                'company_id' => 3,
                'user_created_id' => 1
            ],
            [
                'name' => 'Global Corp. Branch 2',
                'phone_number' => '555-555-5555',
                'address' => '456 Cherry St.',
                'email' => 'globalb2@gmail.com',
                'company_id' => 3,
                'user_created_id' => 1
            ],
        ];

        foreach ($branchOffices as $branchOffice) {
            BranchOffice::create($branchOffice);
        }
    }
}
