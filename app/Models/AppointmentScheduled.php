<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentScheduled extends Model
{
    protected $table = 'appointmentscheduled';
    protected $fillable = [
        'request_date', 'customer_name', 'contact_no', 'email', 'address',
        'scheduled_date', 'scheduled_time', 'services', 'staff_remark'
    ];
}
