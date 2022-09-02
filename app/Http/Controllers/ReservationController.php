<?php

namespace App\Http\Controllers;

use App\Actions\Events\MakeReservationAction;
use App\Http\Requests\ReceiptNumberOnlyRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Traits\paystackCallbackTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    use ResponseTrait, paystackCallbackTrait;

    public function makeReservation(ReservationRequest $request)
    {
        return (new MakeReservationAction())->makeReservation($request->all());
    }

    public function previewReservation(ReceiptNumberOnlyRequest $request)
    {
        $reservation = Reservation::where('receipt_number', $request->receipt_number)->get();

        if ($reservation->isEmpty()) return $this->error('Receipt number is invalid', 402, 'receipt number is invalid');

        return $this->success((new ReservationResource($reservation[0])), 'booked successfully', 200);
    }

    public function paystackCallback(Request $data)
    {
        $reference = $data->query('reference');
        return $this->getCallbackData($reference);
    }
}
