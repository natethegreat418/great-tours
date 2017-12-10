<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function tours() {
    return $this->belongsToMany('App\Tour')->withTimestamps();
  }
}
