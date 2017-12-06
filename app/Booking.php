<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function departure()
  {
    # Departure belongs to Departure
    return $this->belongsTo('App\Departure');
  }

  public function tour()
  {
    # Departure belongs to Tour
    return $this->belongsTo('App\Tour');
  }
}
