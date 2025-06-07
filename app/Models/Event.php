<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'short_description',
        'description',
        'venue',
        'event_datetime',
        'ticket_count',
        'ticket_cost',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_url',
        'is_active'
    ];
    protected $casts = [
    'event_datetime' => 'datetime',
];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
