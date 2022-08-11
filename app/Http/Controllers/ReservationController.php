<?php

namespace App\Http\Controllers;

use App\Actions\Events\MakeReservationAction;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function makeReservation(ReservationRequest $request)
    {
        return (new MakeReservationAction())->makeReservation($request->all());
    }
}
