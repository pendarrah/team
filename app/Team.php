<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
