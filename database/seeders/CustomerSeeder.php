<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'name' => 'Test Müşteri A.Ş.',
            'email' => 'info@testmusteri.com',
            'password' => Hash::make('musteri123'),
            'phone' => '0212 555 55 55',
            'company' => 'Test Müşteri A.Ş.',
            'address' => 'Test Mahallesi, Test Sokak No:1',
            'city' => 'İstanbul',
            'country' => 'Türkiye',
            'tax_number' => '1234567890',
            'tax_office' => 'Test Vergi Dairesi',
            'status' => 'active'
        ]);
    }
} 