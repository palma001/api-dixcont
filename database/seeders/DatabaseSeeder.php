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
            'password' => Hash::make('123456')
        ]);

        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            CoinSeeder::class,
            PaymentMethodSeeder::class,
            InvoiceTypeSeeder::class,
            ProductSeeder::class,
            LivingRoomSeeder::class,
            TableSeeder::class
        ]);
    }
}
