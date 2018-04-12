<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Theme;


class Trigger extends Model
{
    protected $fillable = [
        'type',
        'trigger',
    ];


    public function themes()
    {
        return $this->belongsToMany('App\Theme');
    }

    public function addTrigger(Request $request)
    {
        return $this->create($request->all());

    }
}
