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
      ['GTI', 'GTI.jpg', 'Drink Guinness straight from the source', 'Europe', 'europe', 'Grand Tour of Ireland', 'grand-tour-of-ireland', 'Ireland photo'],
      ['CRA', 'CRA.jpg', 'Discover a lost world...', 'Central America', 'central-america', 'Costa Rican Adventure', 'costa-rican-adventure', 'Costa Rica photo'],
      ['LPB', 'LPB.jpg', 'Pay too much for a trip in the Eye', 'Europe', 'europe', 'London Paris Barcelona', 'london-paris-barcelona', 'London photo'],
      ['WBI', 'WBI.jpg', 'Pretend to be Bill Bryson and walk around the Isles', 'Europe', 'europe', 'Walk the British Isles', 'walk-the-british-isles', 'Scotland photo'],
      ['EAA', 'EAA.jpg', 'Trek through the mountains of Switzerland and Germany', 'Europe', 'europe', 'European Alps Adventure', 'european-alps-adventure', 'Alps photo'],
      ['BBB','BBB.jpg', 'Climb Mayan ruins and snorkel amongst the reefs', 'Central America', 'central-america', 'Belize Beaches and Beyond', 'belize-beaches-and-beyond', 'Belize photo']
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
        'region_url' => $tour[4],
        'name' => $tour[5],
        'url_path' => $tour[6],
        'img_alt' => $tour[7],
      ]);
      $count--;
    }
  }
}
