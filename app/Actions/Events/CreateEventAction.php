<?php

namespace App\Actions\Events;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class CreateEventAction
{
    use ResponseTrait;

    protected $data;

    public function execute(array $data, $image_path)
    {
        $data['image_path'] = $image_path;
        $this->data = $data;
        return $this->create();
    }

    private function create()
    {
        $user = User::findByUid($this->data['user_id']);
        $event = Event::create([
            'uid' => Str::orderedUuid(),
            'user_id' => $user->id,
            'event_name' => $this->data['event_name'],
            'location' => $this->data['location'],
            'event_date' => $this->data['event_date'],
            'start_time' => $this->data['start_time'],
            'end_time' => $this->data['end_time'],
            'maximun_seats' => $this->data['maximun_seats'],
            'image_path' => $this->data['image_path'],
            'type' => $this->data['type'],
        ]);

        return $this->success(['event' => new EventResource($event)], 'Event added successfully');
    }
}
