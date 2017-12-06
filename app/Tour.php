<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
  public function departure()
  {
    # Tour has many DeparturesTableSeeder
    return $this->hasMany('App\Departure');
  }

  public function booking()
  {
    # Tour has many DeparturesTableSeeder
    return $this->hasMany('App\Booking');
  }
}
