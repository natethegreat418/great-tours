<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItineraryController extends Controller
{
  public function index(Request $request)
  {
    $region = $request->route()->parameters()['region'];

    if (!isset($request->route()->parameters()['trip'])) {
      return view('trips')->with([
        'region' => $region
      ]);
    }
    else {
      $trip = $request->route()->parameters()['trip'];
      return view('trips')->with([
        'region' => $region,
        'trip' => $trip
      ]);
    }
  }
}
