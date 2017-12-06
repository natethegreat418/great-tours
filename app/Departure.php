<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    protected $dates = [
      'created_at',
      'updated_at',
      'tour_date'
    ];

    public function tour()
    {
      # Departure belongs to Tour
      return $this->belongsTo('App\Tour');
    }

    public function booking()
    {
      # Tour has many Bookings
      return $this->hasMany('App\Booking');
    }
}
