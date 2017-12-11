<?php

use App\Departure;
use App\Tour;
use App\Booking;

use Illuminate\Database\Seeder;

class UpdateCountBookingsByDeparture extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $departures = Departure::all();

      foreach ($departures as $departure) {
        $tourcode = $departure->tour_code;
        $countbookings = booking::where('tour_code','=', $tourcode)
          ->where('departure_id', '=', $departure->id)
          ->where('status','=', 'booked')
          ->count();
        $departure->currently_booked = $countbookings;
        $departure->save();
      }
    }
}
