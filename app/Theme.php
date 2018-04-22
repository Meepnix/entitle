<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Option;
use App\Trigger;
use App\Save;

class Theme extends Model
{
    protected $fillable = [
        'title',
        'img_link',
        'scope',

    ];


    public function options()
    {
        return $this->hasMany('App\Option');
    }

    public function triggers()
    {
        return $this->belongsToMany('App\Trigger')->withTimestamps();
    }

    public function saves()
    {
        return $this->belongsToMany('App\Save')->withTimestamps();
    }

    public function addTheme(Request $request)
    {
        return $this->create($request->all());

    }

    public function addOption(Request $request)
    {
        return $this->options()->create($request->all());

    }
}
