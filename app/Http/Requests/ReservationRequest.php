<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'event_id' => ['required', 'string', 'exists:events,uid'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'ticket_type' => ['required', 'in:regular,gold,silver,platinum'],
            'number_of_reservation' => ['required', 'integer'],

        ];
    }

    protected function passedValidation()
    {

        if ($this->request->has('event_id')) {
            $event = Event::where('uid', $this->event_id)->first();
            $this->merge([
                'event_id' => $event->id,
                'event_type' => $event->type
            ]);
        }
    }
}
