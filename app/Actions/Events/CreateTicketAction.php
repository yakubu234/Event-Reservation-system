<?php

namespace App\Actions\Events;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Str;

class CreateTicketAction
{
    use ResponseTrait;

    protected $data;

    public function execute(array $data)
    {
        $this->data = $data;
        return $this->create();
    }

    private function create()
    {
        $event = Event::findByUid($this->data['event_id']);

        if ($this->data['maximum_reservation'] > $number = ($event->maximun_seats - $event->tickect_type_count)) {
            return $this->error('The maximum reservation you supplied is higher than the seats left', 401, "{$number} seats remaining");
        }

        if (Ticket::where(array('event_id' => $event->id, 'type' => $this->data['type']))->first()) {
            return $this->error("You already create a {$this->data['type']} ticket for this event", 401, " You can update anyway");
        }

        $ticket = Ticket::firstOrCreate(
            [
                'event_id' => $event->id,
                'type' => $this->data['type'],
                'uid' => Str::orderedUuid(),
                'amount' => $this->data['amount'],
                'current_reservation' => '0',
                'maximum_reservation' => $this->data['maximum_reservation']
            ]
        );

        return $this->success(['ticket' => $ticket], 'Ticket created successfully');
    }
}
