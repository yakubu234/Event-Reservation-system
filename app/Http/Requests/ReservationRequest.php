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
            'calback_url' => ['required', 'string'],

        ];
    }

    protected function passedValidation()
    {

        $event = Event::where('uid', $this->event_id)->first();
        $eventNameFirstLetters = strtoupper(implode('', array_map(function ($v) {
            return $v[0];
        }, explode(' ', $event->event_name))));

        $this->merge([
            'event_id' => $event->id,
            'event_type' => $event->type,
            'event_name_first_letters' => $eventNameFirstLetters
        ]);
    }
}
