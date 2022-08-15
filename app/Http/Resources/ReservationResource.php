<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->reservation_uid,
            'number_of_reservation' => $this->number_of_reservation,
            'receipt_number' => $this->receipt_number,
            'ticket_type' => $this->ticket_type,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'payment' => $this->payment,
            'event' => $this->event,
        ];
    }
}
