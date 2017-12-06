<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Departure;
use App\Booking;

class BookingController extends Controller
{
    public function index(Request $request)
    {
      $this->validate($request, [
        'departure' => 'required',
        'tripid' => 'required'
      ]);

      return redirect('/booking/details');
    }

    public function details(Request $request)
    {
      return redirect('/booking/payment');
    }

    public function payment(Request $request)
    {
      return redirect('/booking/confirmed');
    }
}
