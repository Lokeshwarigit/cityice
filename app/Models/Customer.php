<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'sno', 'customer_number', 'email', 'address', 'service_history', 'status', 'document',
    ];
    
    use HasFactory;
}
