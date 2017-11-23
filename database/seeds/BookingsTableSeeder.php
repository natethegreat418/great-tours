<?php

use Illuminate\Database\Seeder;
use App\Booking;

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
        [1, 1, 'natethetest@test.com', 'booked'],
        [1, 2, 'natethetest@test.com', 'cancelled'],
        [1, 1, 'jimthetest@test.com', 'booked'],
        [2, 3, 'tomthetest@test.com', 'cancelled'],
        [2, 3, 'fredthetest@test.com', 'booked'],
        [3, 6, 'fredthetest@test.com', 'booked'],
        [3, 6, 'samthetest@test.com', 'booked'],
        [3, 6, 'bobthetest@test.com', 'booked'],
        [3, 6, 'brettthetest@test.com', 'cancelled'],
        [2, 3, 'brettthetest@test.com', 'booked'],
      ];

      $count = count($bookings);

      foreach ($bookings as $key => $booking) {
        booking::insert([
          'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
          'tour_id' => $booking[0],
          'departure_id' => $booking[1],
          'user' => $booking[2],
          'status' => $booking[3],
        ]);
        $count--;
      }
    }
}
