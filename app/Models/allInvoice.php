<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allInvoice extends Model
{
    use HasFactory;
     protected $fillable = [
        'invoice_no', 'invoice_date', 'name', 'contact_no',
        'address', 'servicing_date', 'servicing_by', 'payment_mode',
    ];
}
