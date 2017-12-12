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
    $region = $request->route()->parameters()['region'];
    $trip = $request->route()->parameters()['trip'];
    $gettour = Tour::where('url_path', '=', $trip)->get()->toArray();
    $tour = $gettour[0];
    $departures = Departure::where('tour_id', '=', $tour['id'])->where('status','=','Available')->get()->toArray();
    $numberdepartures = Departure::where('tour_id', '=', $tour['id'])->where('status','=','Available')->count();

    return view('trip')->with([
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
    return view('region')->with([
      'region' => $region,
      'returnedtrips' => $relevanttrips
      ]);
  }
}
