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

    // Remember quoted departure
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

    // Save form data into session
    $request->session()->put('email', $request['email']);
    $request->session()->put('firstname', $request['firstname']);
    $request->session()->put('lastname', $request['lastname']);
    $request->session()->put('sex', $request['sex']);

    // Get any bookings for given user on requested departure
    $existingbooking = Booking::where('user', '=', $request['email'])
    ->where('departure_id', "=", session('departureid'))->first();

    // Existing booking for user on departure
    if(count($existingbooking) > 0) {

      // Booking is confirmed, return error
      if($existingbooking->status === 'booked') {
        return back()->withInput()->with('alert', 'A user with that email address is already booked on this trip.');
      }

      // Booking is incomplete
      elseif($existingbooking->status === 'incomplete') {

        $incompletebooking = $existingbooking;

        // Proceed to payment with purchase summary
        $request->session()->put('incompletebookingid', $incompletebooking->id);
        $request->session()->put('price', $incompletebooking->departure->price);
        $request->session()->put('departuredate', $incompletebooking->departure->tour_date);
        $request->session()->put('tourname', $incompletebooking->tour->name);

        return redirect('/booking/payment');
      }
    }

    // Existing booking doesn't exist, create one
    $departure = Departure::where('id','=', session('departureid'))->first();

    $booking = new Booking;
    $booking->tour_code = $departure->tour_code;
    $booking->tour_id = $departure->tour_id;
    $booking->departure_id = $departure->id;
    $booking->user = $request['email'];
    $booking->status = 'incomplete';
    $booking->save();

    $incompletebooking = Booking::with('tour','departure')->where('user', '=', $request['email'])
    ->where('departure_id', '=', $departure->id)
    ->first();

    // Proceed to payment with purchase summary
    $request->session()->put('incompletebookingid', $incompletebooking->id);
    $request->session()->put('price', $incompletebooking->departure->price);
    $request->session()->put('departuredate', $incompletebooking->departure->tour_date);
    $request->session()->put('tourname', $incompletebooking->tour->name);

    return redirect('/booking/payment');
  }

  // Collect and validate "payment", updates booking
  public function payment(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'number' => 'required',
      'expiry' => 'required'
    ]);

    // Check that expiration on card is greater than today
    $convertexpiry = strtotime($request->expiry);

    if($convertexpiry < strtotime('now')) {
      return redirect('booking/payment')->with('alert', 'That card is expired. Please enter a valid payment method.');
    }

    // Find incomplete booking
    $booking = Booking::where('id', '=', session('incompletebookingid'))->first();

    // Update and finalize booking
    $booking->status = 'booked';
    $booking->save();

    // Update number travelers on departure
    $departure = Departure::where('id', '=', $booking->departure_id)->first();
    $departure->currently_booked = ($departure->currently_booked)+1;
    $departure->save();

    $request->session()->flush();

    return redirect('/booking/confirmed');
  }

  public function forget(Request $request)
  {
    // Delete the incomplete booking in session
    Booking::destroy(session('incompletebookingid'));

    // Forget related booking data in session (keep email)
    $request->session()->forget('incompletebookingid');
    $request->session()->forget('price');
    $request->session()->forget('departuredate');
    $request->session()->forget('tourname');
    $request->session()->forget('firstname');
    $request->session()->forget('lastname');
    $request->session()->forget('sex');
    $request->session()->forget('departureid');

    return redirect('/');
  }
}
