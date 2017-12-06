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

      return redirect('/booking/details')->with([
        $request['departure'] => session('departure')
      ]);
    }

    public function details(Request $request)
    {
      $this->validate($request, [
        'email' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'sex' => 'required'
      ]);

      return redirect('/booking/payment')->with([
        $request['email'] => session('email'),
        $request['firstname'] => session('firstname'),
        $request['lastname'] => session('lastname'),
        $request['sex'] => session('sex')
      ]);
    }

    public function payment(Request $request)
    {
      $this->validate($request, [
        'cardname' => 'required',
        'cardnumber' => 'required',
        'paymentzip' => 'required'
      ]);
      
      return redirect('/booking/confirmed');
    }
}
