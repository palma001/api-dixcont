<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'username' => 'test',
            'role_id' => 1,
            'password' => Hash::make('123456')
        ]);

        $this->call([
            CompanySeeder::class,
            BranchOfficeSeeder::class,
            DocumentTypeSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            CoinSeeder::class,
            TaxeSeeder::class,
            PaymentMethodSeeder::class,
            InvoiceTypeSeeder::class,
            TypeOfServiceSeeder::class,
            InvoiceTypeTaxeSeeder::class,
            ProductSeeder::class,
            LivingRoomSeeder::class,
            TableSeeder::class,
            ModuleSeeder::class,
            ModuleRoleSeeder::class,
        ]);
    }
}
