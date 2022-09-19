<?php

namespace App\Actions\Events;

use App\Http\Resources\ReservationResource;
use App\Models\Event;
use App\Models\Payments;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Traits\InitiatePaystackTrait;
use App\Traits\ResponseTrait;
use Str;

class MakeReservationAction
{
    use ResponseTrait, InitiatePaystackTrait;

    const EVENT_TYPE_FREE = 'free';

    public function makeReservation($data)
    {
        $ticket = Ticket::where(array('type' => $data['ticket_type'], 'event_id' => $data['event_id']))->first();

        if (!$ticket) return $this->error('the ticket is unavailable', 401, "theres no {$data['ticket_type']} ticket for reservation");

        if ($data['number_of_reservation'] > $remainer = $ticket->maximum_reservation - $ticket->current_reservation) {
            return $this->error('the ticket is unavailable', 401, "{$remainer} reservation(s) left");
        }

        if ($data['event_type'] == self::EVENT_TYPE_FREE) {
            $ticket->increment('current_reservation', $data['number_of_reservation']);

            $data = array_merge($data, ['amount' => '00.00', 'status' => 'successful', 'reference' => 'free']);
            return $this->saveReservation($data);
        }

        $data['amount'] = ((float) $ticket->amount * (int) $data['number_of_reservation']);
        $data['tickect_id'] = $ticket->id;
        return $this->proceedToPayment($data);
    }

    public function payloadFromPaystackCallback($data)
    {
        $metadata = $data['metadata'];
        $ticket = Ticket::where(array('type' => $metadata['ticket_type'], 'event_id' => $metadata['event_id']))->first();

        if ($metadata['number_of_reservation'] > $remainder = $ticket->maximum_reservation - $ticket->current_reservation) {
            $this->prepareRefund($data, $remainder);
            return $this->error('the ticket is unavailable', 401, "{$remainder} reservation(s) left");
        }

        $ticket->increment('current_reservation', $metadata['number_of_reservation']);

        $metadata = array_merge($metadata, ['amount' => $metadata['amount'], 'status' => 'successful', 'reference' => $data['reference']]);
        return $this->saveReservation($metadata);
    }

    private function saveReservation($data)
    {
        $receipt = $data['event_name_first_letters'] . substr($data['phone'], -4) . strtoupper(Str::random(4));

        $data = array_merge($data, ['receipt_number' => $receipt, 'reservation_uid' => Str::orderedUuid()]);

        $reservation = Reservation::create($data);

        $this->savePayments($data);
        $this->updateReservationsInEvents($data['event_id']);

        return $this->success((new ReservationResource($reservation)), 'booked successfully', 200);
    }

    private function updateReservationsInEvents(string $eventId)
    {
        $tickects = Ticket::where('event_id', $eventId)->get();
        if ($tickects->isEmpty()) return true;

        $current_reservation = 0;

        foreach ($tickects as $key => $ticket) {
            $current_reservation  += $ticket['current_reservation'];
        }

        Event::where('id', $eventId)->update(['total_reservation' => $current_reservation]);

        return true;
    }

    private function savePayments(array $data)
    {
        Payments::create([
            "payment_uid" => Str::orderedUuid(),
            "reservation_uid" => $data['reservation_uid'],
            "amount" => $data['amount'],
            "reference" => $data['reference'],
            "type" => $data['event_type'],
            "status" => $data['status'],
        ]);

        return true;
    }

    private function prepareRefund($data, $remainder)
    {
        # handle the refund in a job
    }
}
