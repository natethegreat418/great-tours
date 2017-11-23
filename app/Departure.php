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
}
