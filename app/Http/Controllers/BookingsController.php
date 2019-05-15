<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function book(Request $request){
        $this->validateRequest($request);
        $booking = new Booking();
        $booking->fill($request->all());
        $booking->save();
        return $booking;
    }

    public function validateRequest(Request $request){
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'number_of_users' => 'required|integer',
            'booking_price' => 'required|numeric',
            'start_date' => 'required|date',
        ]);
    }
}
