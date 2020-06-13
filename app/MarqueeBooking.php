<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarqueeBooking extends Model
{
    protected $table = 'marquee_bookings';
    protected $guarded = [];

    protected $dates = ['reserve_date'];

    public function marquee()
    {
        return $this->belongsTo('App\Marquee', 'marquee_id', 'id');
    }

    public function menu(){
    	return $this->belongsTo('App\Menu','menu_id','id');
    }

    public function getButtonColorAttribute()
    {
        $status = $this->status;
        if($status === 'approved') {
           $btn_color = 'success';
        } elseif($status === 'pending') {
            $btn_color = 'warning';
        } else {
            $btn_color = 'danger';
        }
        return $btn_color;
    }
}
