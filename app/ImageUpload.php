<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $guarded = [];
    protected $table = 'image_uploads';

    public function marquee()
    {
        return $this->belongsTo('App\Marquee', 'marquee_id', 'id');
    }
}
