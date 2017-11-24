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
      ['GTI', 'https://www.nationalgeographic.com/content/dam/travel/Guide-Pages/europe/ireland/ireland_NationalGeographic_1561052.ngsversion.1501515053876.adapt.1900.1.jpg', 'Drink Guinness straight from the source', 'Europe', 'Grand-Tour-of-Ireland'],
      ['CRA', 'https://www.airtransat.com/getmedia/a3652ee2-5b50-4b17-b35d-d76f5d2862b3/Costa-Rica01.jpg?width=980', 'Discover a lost world...', 'Central-America', 'Costa-Rican-Adventure'],
      ['LPB', 'https://realbusiness.co.uk/wp-content/uploads/2017/02/shutterstock_362072633.jpg', 'Pay too much for a trip in the Eye', 'Europe', 'London-Paris-Barcelona'],
    ];

    $count = count($tours);

    foreach ($tours as $key => $tour) {
      Tour::insert([
        'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
        'code' => $tour[0],
        'tile_image' => $tour[1],
        'descr' => $tour[2],
        'region' => $tour[3],
        'name' => $tour[4],
      ]);
      $count--;
    }
  }
}
