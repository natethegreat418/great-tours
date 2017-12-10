<?php

use Illuminate\Database\Seeder;
use App\Tour;

class ToursTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $tours = [
      ['GTI', 'GTI.jpg', 'Drink Guinness straight from the source', 'Europe', 'Grand-Tour-of-Ireland'],
      ['CRA', 'CRA.jpg', 'Discover a lost world...', 'Central-America', 'Costa-Rican-Adventure'],
      ['LPB', 'LPB.jpg', 'Pay too much for a trip in the Eye', 'Europe', 'London-Paris-Barcelona'],
    ];

    $count = count($tours);

    foreach ($tours as $key => $tour) {
      Tour::insert([
        'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'tour_code' => $tour[0],
        'tile_image' => $tour[1],
        'descr' => $tour[2],
        'region' => $tour[3],
        'name' => $tour[4],
      ]);
      $count--;
    }
  }
}
