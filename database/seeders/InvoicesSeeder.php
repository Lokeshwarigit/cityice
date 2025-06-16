<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use Illuminate\Support\Str;

class InvoicesSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Invoice::create([
                'invoice_no'     => 'INV-000' . $i,
                'invoice_date'   => now()->subDays($i),
                'name'           => 'Customer ' . $i,
                'contact_no'     => '98765432' . $i,
                'address'        => 'Address ' . $i,
                'servicing_date' => now()->subDays($i + 1),
                'servicing_by'   => 'Technician ' . $i,
                'payment_mode'   => 'Cash',
                'sin'            => 'SIN' . Str::random(5),
            ]);
        }
    }
}
