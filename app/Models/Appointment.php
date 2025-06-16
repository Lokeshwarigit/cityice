<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model

{
    
    public $primaryKey = 'sno';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'sno', 'request_date', 'customer_name', 'contact_no',
        'email', 'address', 'preferred_date', 'preferred_time',
    ];
}
  



