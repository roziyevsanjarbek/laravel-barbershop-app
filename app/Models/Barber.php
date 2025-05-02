<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'barber_type',
        'birthday',
    ];

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
