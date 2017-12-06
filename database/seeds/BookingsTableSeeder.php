<?php

use Illuminate\Database\Seeder;
use App\Booking;
use App\Tour;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $bookings = [
        ['GTI', 1, 'natethetest@test.com', 'booked'],
        ['GTI', 2, 'natethetest@test.com', 'cancelled'],
        ['GTI', 1, 'jimthetest@test.com', 'booked'],
        ['CRA', 3, 'tomthetest@test.com', 'cancelled'],
        ['CRA', 3, 'fredthetest@test.com', 'booked'],
        ['LPB', 6, 'fredthetest@test.com', 'booked'],
        ['LPB', 6, 'samthetest@test.com', 'booked'],
        ['LPB', 6, 'bobthetest@test.com', 'booked'],
        ['LPB', 6, 'brettthetest@test.com', 'cancelled'],
        ['CRA', 3, 'brettthetest@test.com', 'booked'],
      ];

      $count = count($bookings);

      foreach ($bookings as $key => $booking) {

        $tourcode = $booking[0];
        $tour_id = tour::where('tour_code', '=', $tourcode)->pluck('id')->first();

        booking::insert([
          'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
          'tour_code' => $booking[0],
          'tour_id' => $tour_id,
          'departure_id' => $booking[1],
          'user' => $booking[2],
          'status' => $booking[3],
        ]);
        $count--;
      }
    }
}
