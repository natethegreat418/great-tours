<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Departure;

class ItineraryController extends Controller
{
  // Handles requests for specific itineraries
  public function itinerary_display(Request $request)
  {
    $region = $request->route()->parameters()['region'];
    $trip = $request->route()->parameters()['trip'];
    $gettour = Tour::where('name', '=', $trip)->get()->toArray();
    $tour = $gettour[0];
    $departures = Departure::where('tour_id', '=', $tour['id'])->where('status','=','Available')->get()->toArray();
    $numberdepartures = Departure::where('tour_id', '=', $tour['id'])->where('status','=','Available')->count();

    return view('trips')->with([
      'trip' => $trip,
      'region' => $region,
      'tour' => $tour,
      'departures' => $departures,
      'numberdepartures' => $numberdepartures
      ]);
  }

  // Handles requests for groups of tours by region
  public function trip_search(Request $request)
  {
    if(isset($request->route()->parameters()['region'])) {
      $region = $request->route()->parameters()['region'];
        if($region === 'All') {
          $relevanttrips = Tour::all();
          $region = 'All';
        }
        else {
          $relevanttrips = Tour::where('region', '=', $region)->get();
        }
    }
    else {
      $relevanttrips = Tour::all();
      $region = 'All';
    }
    return view('trips')->with([
      'region' => $region,
      'returnedtrips' => $relevanttrips
      ]);
  }
}
