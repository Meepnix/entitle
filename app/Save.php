<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Theme;

class Save extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User')->withTimestamps();
    }

    public function themes()
    {
        return $this->belongsToMany('App\Theme')->withTimestamps();
    }


}
