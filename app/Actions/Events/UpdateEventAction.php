<?php

namespace App\Actions\Events;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Str;

class UpdateEventAction
{
    use ResponseTrait;

    public function execute(array $data)
    {
        $eventId = $data['event_id'];
        unset($data['event_id']);

        $event = tap(Event::where('uid', $eventId))->update($data)->first();

        return $this->success(['event' => new EventResource($event)], 'Event updated successfully');
    }
}
