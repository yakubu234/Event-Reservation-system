<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;

class DeleteEventRequest extends FormRequest
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
            'event_id' => ['required', 'string', 'exists:events,uid'],
            'event_name' => ['string'],
        ];
    }

    protected function passedValidation()
    {

        $event = Event::where('uid', $this->event_id)->first();
        $this->merge([
            'event_id' => $event->id,
        ]);
    }
}
