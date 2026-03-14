<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Bill::insert([
            ['type' => 'electricity', 'consumption' => 300.00, 'amount_paid' => 72.00, 'unit' => 'kWh', 'date_start' => '2025-01-01', 'date_end' => '2025-03-31', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'electricity', 'consumption' => 180.00, 'amount_paid' => 45.00, 'unit' => 'kWh', 'date_start' => '2025-04-01', 'date_end' => '2025-06-30', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'gas', 'consumption' => 150.00, 'amount_paid' => 160.00, 'unit' => 'Smc', 'date_start' => '2025-01-01', 'date_end' => '2025-03-31', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'gas', 'consumption' => 80.00, 'amount_paid' => 70.40, 'unit' => 'Smc', 'date_start' => '2025-04-01', 'date_end' => '2025-06-30', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
