<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected $guarded = ['id'];
}
