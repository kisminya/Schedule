<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $guarded = [];

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }
    public function date()
    {
        return $this->belongsTo('App\Date');
    }
}
