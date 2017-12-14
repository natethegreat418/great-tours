<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Departure;
use App\Tag;
use App\Booking;

class ItineraryController extends Controller
{
  // Handles homepage requests
  public function index()
  {

    $displaytours = Tag::with('tours')->where('display','=',1)->get();

    $recentlyquotedtrip = Departure::with('tour')
    ->where('id','=', session('departureid'))
    ->first();

    if(null !== session('incompletebookingid')) {
      $incompletebooking = Booking::with('tour')
      ->where('id','=', session('incompletebookingid'))
      ->orderBy('updated_at', 'desc')
      ->first();

      return view('home')->with([
        'displaytours' => $displaytours,
        'incompletebooking' => $incompletebooking,
        'recentlyquotedtrip' => $recentlyquotedtrip
      ]);
    }

    return view('home')->with([
      'displaytours' => $displaytours,
      'recentlyquotedtrip' => $recentlyquotedtrip
    ]);
  }

  // Handles requests for all itineraries
  public function all_trips()
  {
    $relevanttrips = Tour::all();
    $recentlyquotedtrip = Departure::with('tour')
    ->where('id','=', session('departureid'))
    ->first();

    if(null !== session('incompletebookingid')) {
      $incompletebooking = Booking::with('tour')
      ->where('id','=', session('incompletebookingid'))
      ->orderBy('updated_at', 'desc')
      ->first();

      return view('explore')->with([
        'returnedtrips' => $relevanttrips,
        'incompletebooking' => $incompletebooking,
        'recentlyquotedtrip' => $recentlyquotedtrip
      ]);
    }

    return view('explore')->with([
      'returnedtrips' => $relevanttrips,
      'recentlyquotedtrip' => $recentlyquotedtrip
    ]);
  }


  // Handles requests for specific itineraries
  public function itinerary_display(Request $request)
  {
    // Query for requested tour
    $trip = $request->route()->parameters()['trip'];
    $gettour = Tour::where('url_path', '=', $trip)->first();

    // If none exist redirect to all trips
    if(count($gettour) < 1) {
      return redirect('trips/explore')->with('alert', 'Sorry, there are is itinerary available with that name');
    }

    // Get associated departures for requested tour
    $departures = Departure::where('tour_id', '=', $gettour->id)->where('status','=','Available')->get()->toArray();

    return view('trip')->with([
      'tour' => $gettour,
      'departures' => $departures
    ]);
  }

  // Handles requests for groups of tours by region
  public function trip_search(Request $request)
  {
    // Get tours associated with requested region
    $region = $request->route()->parameters()['region'];
    $relevanttrips = Tour::where('region', '=', $region)->get();

    // If none exist redirect to all trips
    if(count($relevanttrips) < 1) {
      return redirect('trips/explore')->with('alert', 'Sorry, there are no tours available in that region');
    }

    return view('region')->with([
      'region' => $region,
      'returnedtrips' => $relevanttrips
    ]);
  }
}
