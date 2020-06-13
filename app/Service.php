<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $table = 'services';
    protected $guarded = [];

    public function getMarquee(){
    	return $this->belongsTo('App\Marquee','marquee_id','id');
    }
}

