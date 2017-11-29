<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Departure;

class ItineraryController extends Controller
{
  public function itinerary_display(Request $request)
  {
    $region = $request->route()->parameters()['region'];
    $trip = $request->route()->parameters()['trip'];
    $gettour = Tour::where('name', '=', $trip)->get()->toArray();
    $itinerary = $gettour[0];
    $departures = Departure::where('tour_id', '=', $itinerary['id'])->where('status','=','Available')->get()->toArray();

    return view('trips')->with([
      'trip' => $trip,
      'region' => $region,
      'itinerary' => $itinerary,
      'departures' => $departures
      ]);
  }

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
