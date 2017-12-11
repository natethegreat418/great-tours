<?php

use Illuminate\Database\Seeder;
use App\Departure;
use App\Tour;
use App\Booking;

class DeparturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $departures = [
        ['GTI', '2018-10-10', 'Available', 2000.00, 30],
        ['GTI', '2018-10-16', 'Cancelled', 2000.00, 30],
        ['CRA', '2018-5-17', 'Available', 1500.00, 30],
        ['CRA', '2018-6-1', 'Available', 1600.00, 30],
        ['CRA', '2018-7-7', 'Cancelled', 1600.00, 30],
        ['LPB', '2018-6-10', 'Available', 3000.00, 30],
        ['WBI', '2018-6-14', 'Available', 3200.00, 20],
        ['EAA', '2018-8-7', 'Available', 3000.00, 20],
        ['BBB', '2019-9-1', 'Available', 2400.00, 30],
        ['BBB', '2019-9-14', 'Available', 2300.00, 30]
      ];

      $count = count($departures);

      foreach ($departures as $key => $departure) {

        $tourcode = $departure[0];
        $tour_id = tour::where('tour_code', '=', $tourcode)->pluck('id')->first();
        $countbooked = 0;

        departure::insert([
          'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
          'tour_code' => $departure[0],
          'tour_id' => $tour_id,
          'tour_date' => $departure[1],
          'status' => $departure[2],
          'price' => $departure[3],
          'currently_booked' => $countbooked,
          'available_spots' => $departure[4],
        ]);
        $count--;
      }
    }
}
