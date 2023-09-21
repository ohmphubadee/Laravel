<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'parking_lot_id', 
        'parking_slot_id', 
        'check_in_time', 
        'check_out_time', 
        'total_charge'
    ];
}
