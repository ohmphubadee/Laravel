<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'lat',
        'long',
        'free_time_minutes',
        'rate_per_hour',
        // Add other attributes that you want to be mass assignable
    ];
}
