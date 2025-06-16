<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Invoice::create([
                'invoice_no' => 'INV-' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'invoice_date' => now()->subDays($i),
                'name' => 'Customer ' . $i,
                'contact_no' => '98765432' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'address' => 'Address ' . $i,
                'servicing_date' => now()->addDays($i),
                'servicing_by' => 'Staff ' . $i,
                'payment_mode' => $i % 2 == 0 ? 'Cash' : 'Online',
            ]);
        }
    }
}
