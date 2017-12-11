<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Departure;
use App\Booking;

class BookingController extends Controller
{
  // Begins booking process
    public function index(Request $request)
    {
      $this->validate($request, [
        'departureid' => 'required'
      ]);

      $request->session()->put('departureid', $request['departureid']);

      return redirect('/booking/details');
    }

    // Capture traveler details, incremental save of booking
    public function details(Request $request)
    {
      $this->validate($request, [
        'email' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'sex' => 'required'
      ]);

      // Check if user is already booked on this particular departure
      if(Booking::where('user', '=', $request['email'])
        ->where('departure_id', "=", session('departureid'))
        ->where('status', "=", 'booked')
        ->count() > 0) {
          return back()->withInput()->with('alert', 'A user with that email address is already booked on this trip.');
        }

      $request->session()->put('email', $request['email']);
      $request->session()->put('firstname', $request['firstname']);
      $request->session()->put('lastname', $request['lastname']);
      $request->session()->put('sex', $request['sex']);

      $departure = Departure::where('id','=', session('departureid'))->first();

      // Create the incomplete booking object
      $booking = new Booking;
      $booking->tour_code = $departure->tour_code;
      $booking->tour_id = $departure->tour_id;
      $booking->departure_id = $departure->id;
      $booking->user = $request['email'];
      $booking->status = 'incomplete';
      $booking->save();

      $incompletebookingid = Booking::where('user', '=', $request['email'])
        ->where('departure_id', '=', $departure->id)
        ->pluck('id')
        ->first();

      $request->session()->put('incompletebookingid', $incompletebookingid);

      return redirect('/booking/payment')->with([
        'price' => $departure->price
        ]);
    }

    // Collect and validate "payment", confirm booking
    public function payment(Request $request)
    {
      $this->validate($request, [
        'cardname' => 'required',
        'cardnumber' => 'required',
        'paymentzip' => 'required'
      ]);

      // Find incomplete booking
      $booking = Booking::where('id', '=', session('incompletebookingid'))->first();

      // Update and finalize booking
      $booking->status = 'booked';
      $booking->save();

      // Update number travelers on departure
      $departure = Departure::where('id', '=', $booking->departure_id)->first();
      $departure->currently_booked = ($departure->currently_booked)+1;
      $departure->save();

      return redirect('/booking/confirmed');
    }
}
