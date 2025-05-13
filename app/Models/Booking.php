<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'barber_id',
        'service_id',
        'date',
        'time',
        'first_name',
        'last_name',
        'phone',
        'email',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
