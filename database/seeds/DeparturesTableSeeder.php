<?php

use Illuminate\Database\Seeder;
use App\Departure;

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
        [1, '2018-10-10', 'Available', 2000.00, 0, 30],
        [1, '2018-10-16', 'Cancelled', 2000.00, 0, 30],
        [2, '2018-5-17', 'Available', 1500.00, 0, 30],
        [2, '2018-6-1', 'Available', 1600.00, 0, 30],
        [2, '2018-7-7', 'Pending', 1600.00, 0, 30],
        [3, '2018-6-10', 'Available', 3000.00, 0, 30],
      ];

      $count = count($departures);

      foreach ($departures as $key => $departure) {
        departure::insert([
          'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
          'tour_id' => $departure[0],
          'tour_date' => $departure[1],
          'status' => $departure[2],
          'price' => $departure[3],
          'currently_booked' => $departure[4],
          'available_spots' => $departure[5],
        ]);
        $count--;
      }
    }
}
