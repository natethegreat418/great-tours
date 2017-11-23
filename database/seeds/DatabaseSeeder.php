<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ToursTableSeeder::class);
        $this->call(DeparturesTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
    }
}
