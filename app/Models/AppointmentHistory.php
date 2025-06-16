<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AppointmentHistory extends Model
{
    protected $table = 'appointmenthistory'; // exact table name

    protected $fillable = [
        'name',
        'contact_no',
        'email',
        'address',
        'appointment_date',
        'status',
    ];
}


