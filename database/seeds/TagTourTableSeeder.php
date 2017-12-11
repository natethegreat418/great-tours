<?php

use Illuminate\Database\Seeder;

use App\Tour;
use App\Tag;

class TagTourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $tours =[
          'GTI' => ['Europe', 'Immersion'],
          'CRA' => ['Central America', 'Active', 'Beaches'],
          'LPB' => ['Europe', 'Budget', 'Highlights'],
          'WBI' => ['Europe','Active','Immersion'],
          'BBB' => ['Central America', 'Active', 'Beaches'],
          'EAA' => ['Europe','Active']
      ];

      foreach ($tours as $code => $tags) {

          # Find the given tour from array
          $tour = Tour::where('tour_code', '=', $code)->first();

          foreach ($tags as $tagName) {
              $tag = Tag::where('name', 'LIKE', $tagName)->first();
              # Connect this tag to this tour
              $tour->tags()->save($tag);
          }
      }
    }
}
