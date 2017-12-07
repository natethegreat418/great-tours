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
        'departuredate' => 'required',
        'departureid' => 'required'
      ]);

      $request->session()->put('departuredate', $request['departuredate']);
      $request->session()->put('departureid', $request['departureid']);

      return redirect('/booking/details');
    }

    public function details(Request $request)
    {
      $this->validate($request, [
        'email' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'sex' => 'required'
      ]);

      $request->session()->put('email', $request['email']);
      $request->session()->put('firstname', $request['firstname']);
      $request->session()->put('lastname', $request['lastname']);
      $request->session()->put('sex', $request['sex']);

      $departure = Departure::where('id','=', session('departureid'))->first();

      $booking = new Booking;
      $booking->tour_code = $departure->tour_code;
      $booking->tour_id = $departure->tour_id;
      $booking->departure_id = $departure->id;
      $booking->user = $request['email'];
      $booking->status = 'incomplete';
      $booking->save();

      $request->session()->put('price', $departure->price);

      $incompletebookingid = Booking::where('user', '=', $request['email'])
        ->where('departure_id', '=', $departure->id)
        ->pluck('id')
        ->first();

      $request->session()->put('incompletebookingid', $incompletebookingid);

      return redirect('/booking/payment');
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
