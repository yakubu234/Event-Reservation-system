<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class EventIdOnlyRequest extends FormRequest
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
            'event_name' => ['string', 'unique:events,event_name'],
            'description' => ['text'],
            'location' => ['string'],
            'event_date' => ['date_format:Y-m-d'],
            'status' => ['in:active,inactive'],
            'type' => ['in:free,paid'],
            'maximun_seats' => ['string'],
            'start_time' => ['string'],
            'end_time' => ['string'],
            'file' => ['file', 'mimes:img,mp4,jpeg,jpg,png,ico', 'max:2048']
        ];
    }
}
