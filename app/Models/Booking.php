<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'barber_id',
        'service_id',
        'date',
        'time',
        'first_name',
        'last_name',
        'phone',
        'email',
    ];
}
