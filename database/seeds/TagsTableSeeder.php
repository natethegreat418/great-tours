<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tags = [
          ['Europe', 1],
          ['South America', 0],
          ['Central America', 0],
          ['Budget', 0],
          ['Highlights', 0],
          ['Active', 1],
          ['Immersion', 0],
          ['Beaches', 0],
          ['Celebrations', 0]
        ];

      foreach ($tags as $tag) {
          $newtag = new Tag();
          $newtag->name = $tag[0];
          $newtag->display = $tag[1];
          $newtag->save();
      }
    }
}
