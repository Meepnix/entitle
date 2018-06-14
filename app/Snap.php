<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Theme;

class Snap extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User')->withTimestamps();
    }

    public function themes()
    {
        return $this->belongsToMany('App\Theme')->withTimestamps();
    }

    public function options()
    {
        return $this->belongsToMany('App\Option')
                    ->withPivot('client', 'worker')
                    ->withTimestamps();
    }

    public function adviserOptions()
    {
        return $this->options()->wherePivot('worker', '=', '1');
    }

    public function clientOptions()
    {
        return $this->options()->wherePivot('client', '=', '1');
    }


}
