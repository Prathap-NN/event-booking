<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     use HasFactory;

    protected $fillable = [
        'event_id', 'name', 'email', 'phone', 'city', 'state', 'country', 'payment_status'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
