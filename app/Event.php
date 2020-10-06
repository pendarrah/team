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


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
