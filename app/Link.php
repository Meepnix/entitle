<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;

class Link extends Model
{
    public function options()
    {
        return $this->belongsTo('App\Option')->withTimestamps();
    }
}
