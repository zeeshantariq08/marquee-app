<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $guarded = [];

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}
