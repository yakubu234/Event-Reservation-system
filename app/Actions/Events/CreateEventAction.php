<?php

namespace App\Actions\Events;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class CreateEventAction
{
    const EVENT_FREE = 'free', REGULAR = 'regular';

    use ResponseTrait;

    protected $data;

    public function execute(array $data)
    {
        $this->data = $data;
        return $this->create();
    }

    private function create()
    {
        $user = User::findByUid($this->data['user_id']);
        $this->data = array_merge($this->data, [
            'uid' => Str::orderedUuid(),
            'tickect_type_count' => 0,
            'user_id' => $user->id,
        ]);

        $event = Event::create($this->data);

        if ($event->type == self::EVENT_FREE) {

            $event->increment('tickect_type_count', $event->maximun_seats);
            $this->createTicket($event);
        }

        return $this->success(['event' => new EventResource($event)], 'Event added successfully');
    }

    private function createTicket($event)
    {
        return Ticket::firstOrCreate(
            [
                'event_id' => $event['id'],
                'type' => self::REGULAR,
                'uid' => Str::orderedUuid(),
                'amount' => '0',
                'current_reservation' => '0',
                'maximum_reservation' => $event['maximun_seats']
            ]
        );
    }
}
