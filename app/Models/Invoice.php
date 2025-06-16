<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Invoice extends Model
{
   protected $fillable = [
        'name', 'contact', 'address', 'app_date', 'app_time', 'services', 'remarks'
    ];
}