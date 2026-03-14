<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Offer::insert([
            ['provider_name' => 'Enel', 'type' => 'electricity', 'unit_price' => 0.2200, 'unit' => 'kWh', 'created_at' => now(), 'updated_at' => now()],
            ['provider_name' => 'Edison', 'type' => 'electricity', 'unit_price' => 0.1950, 'unit' => 'kWh', 'created_at' => now(), 'updated_at' => now()],
            ['provider_name' => 'Eni', 'type' => 'electricity', 'unit_price' => 0.2100, 'unit' => 'kWh', 'created_at' => now(), 'updated_at' => now()],
            ['provider_name' => 'Enel', 'type' => 'gas', 'unit_price' => 0.9500, 'unit' => 'Smc', 'created_at' => now(), 'updated_at' => now()],
            ['provider_name' => 'Edison', 'type' => 'gas', 'unit_price' => 0.8800, 'unit' => 'Smc', 'created_at' => now(), 'updated_at' => now()],
            ['provider_name' => 'Eni', 'type' => 'gas', 'unit_price' => 0.9100, 'unit' => 'Smc', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
