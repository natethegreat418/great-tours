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
        ['BBB', 9, 'bobthebooking1@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking2@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking3@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking4@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking5@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking6@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking7@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking8@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking9@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking10@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking11@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking12@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking13@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking14@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking15@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking16@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking17@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking18@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking19@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking20@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking21@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking22@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking23@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking24@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking25@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking26@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking27@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking28@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking29@booking.com', 'booked'],
        ['BBB', 9, 'bobthebooking30@booking.com', 'booked']
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
