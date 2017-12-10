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
      $tags = ['Europe', 'South America', 'Central America', 'Budget', 'Highlights','Active', 'Immersion', 'Beaches', 'Celebrations'];

      foreach ($tags as $tagName) {
          $tag = new Tag();
          $tag->name = $tagName;
          $tag->save();
      }
    }
}
