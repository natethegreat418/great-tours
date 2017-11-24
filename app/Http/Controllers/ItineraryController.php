<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class ItineraryController extends Controller
{
  public function itinerary_display(Request $request)
  {
    $region = $request->route()->parameters()['region'];
    $trip = $request->route()->parameters()['trip'];
    // $itinerary = Tour::where('name', 'like', $trip)->get();
    return view('trips')->with([
      'region' => $region,
      'tripname' => $trip
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
