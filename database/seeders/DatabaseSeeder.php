<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Customer::create([
            'customer_name' => 'Customer 1',
        ]);
        \App\Models\Product::create([
            'name' => 'Product 1',
            'price' => 100,
        ]);
        \App\Models\Product::create([
            'name' => 'Product 2',
            'price' => 100,
        ]);
        
        \App\Models\CustomerAddress::create([
            'customer_id' => 1,
            'address' => "Bandung",
        ]);
        \App\Models\PaymentMethod::create([
            'name' => "Gopay",
            'is_active' => 1,
        ]);
        \App\Models\PaymentMethod::create([
            'name' => "Transfer BRI",
            'is_active' => 1,
        ]);
    }
}
