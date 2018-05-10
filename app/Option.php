<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Theme;

class Option extends Model
{
    protected $fillable = [
        'title',
        'advice',
        'aic',
        'outcome',
    ];

    public function links()
    {
        return $this->hasMany('App\Link');
    }

    public function themes()
    {
        return $this->belongsTo('App\Theme', 'theme_id');
    }

    public function snaps()
    {
        return $this->belongsToMany('App\Snap')->withPivot('client', 'worker')->withTimestamps();
    }

    public function findOp($find)
    {
        $result = $this->findOrfail($find);

        if($result) {
            return(true);
        } else {
            return(false);
        }

    }
    public function addLink(Request $request)
    {
        return $this->links()->create($request->all());

    }

}
