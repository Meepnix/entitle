<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;

class Link extends Model
{
    protected $fillable = [
        'title',
        'link',
    ];

    protected $with = ['options'];

    public function options()
    {
        return $this->belongsTo('App\Option', 'option_id');
    }
}
