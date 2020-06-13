<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

	protected $table = 'menus';
    protected $guarded = [];

    public function marquee()
    {
        return $this->belongsTo('App\Marquee', 'marquee_id', 'id');
    }

    public function dishes(){
    	return $this->hasMany('App\Dish','menu_id','id');
    }

    public function bookings(){
    	return $this->hasMany('App\MarqueeBooking','menu_id','id');
    }
}
