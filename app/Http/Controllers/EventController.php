<?php

namespace App\Http\Controllers;

use App\Actions\Events\AllEventsAction;
use App\Actions\Events\CreateEventAction;
use App\Actions\Events\CreateTicketAction;
use App\Actions\Events\DeleteEventAction;
use App\Actions\Events\MyEventsAction;
use App\Actions\Events\UpdateEventAction;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\EventIdOnlyRequest;
use App\Http\Requests\UserIdOnlyRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function create(CreateEventRequest $request)
    {
        $image_path = null;

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('file', $fileName, 'public');
            (array) $request = $request->validated();
            unset($request['file']);
            $image_path = '/storage/' . $filePath;
        } else {
            $request = $request->all();
        }

        return (new CreateEventAction())->execute($request, $image_path);
    }

    public function update(EventIdOnlyRequest $request)
    {
        return (new UpdateEventAction())->execute($request->all());
    }

    public function delete(EventIdOnlyRequest $request)
    {
        return (new DeleteEventAction())->execute($request->all());
    }

    public function myEvent()
    {
        return (new MyEventsAction())->events();
    }

    public function all()
    {
        return (new AllEventsAction())->events();
    }

    public function createTicket(CreateTicketRequest $request)
    {
        return (new CreateTicketAction())->execute($request->validated());
    }
}
