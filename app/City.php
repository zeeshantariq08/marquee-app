<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   
    protected $guarded = [];

    public function marquees()
    {
        return $this->hasMany('App\Marquee', 'city_id', 'id');
    }
}
