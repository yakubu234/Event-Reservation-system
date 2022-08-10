<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'event_id',
        'ticket_type',
        'receipt_number',
        'reservation_uid',
        'number_of_reservation',
    ];
}
