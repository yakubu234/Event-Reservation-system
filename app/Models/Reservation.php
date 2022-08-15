<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function payment(): BelongsTo
    {
        return $this->BelongsTo(Payments::class, 'reservation_uid', 'reservation_uid');
    }

    public function event(): HasOne
    {
        return $this->HasOne(Event::class, 'id', 'event_id');
    }
}
