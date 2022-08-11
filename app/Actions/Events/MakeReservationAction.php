<?php

namespace App\Actions\Events;

use App\Models\Ticket;
use App\Traits\InitiatePaystackTrait;
use App\Traits\ResponseTrait;

class MakeReservationAction
{
    use ResponseTrait, InitiatePaystackTrait;

    const EVENT_TYPE_FREE = 'free';

    public function makeReservation($data)
    {
        $ticket = Ticket::where(array('type' => $data['ticket_type'], 'event_id' => $data['event_id']))->first();

        if (!$ticket) return $this->error('the ticket is unavailable', 401, "theres no {$data['ticket_type']} ticket for reservation");

        if ($data['number_of_reservation'] > $remainer = $ticket->maximum_reservation - $ticket->current_reservation) {
            return $this->error('the ticket is unavailable', 401, "theres no {$remainer} ticket for reservation");
        }

        if ($data['event_type'] == self::EVENT_TYPE_FREE) {
            $ticket->update(['current_reservation' => $data['number_of_reservation']]);
            return $this->saveReservation($data);
        }

        return $this->prepareForPayment($data);
    }

    private function saveReservation($data)
    {
    }
}
