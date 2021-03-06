<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;


    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
