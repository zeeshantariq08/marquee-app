<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marquee extends Model
{
    
    protected $table = 'marquees';
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function services(){
    	return $this->hasMany('App\Service','marquee_id','id');
    }

    public function gallerys(){
        return $this->hasMany('App\ImageUpload','marquee_id','id');
    }

    public function menus(){
    	return $this->hasMany('App\Menu','marquee_id','id');
    }

    public function bookings(){
        return $this->hasMany('App\MarqueeBooking','marquee_id','id');
    }
}
