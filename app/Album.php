<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title', 'slug',
    ];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function getThumbAttribute()
    {
        $image = null;
        $photo = $this->photos()->first();
        if ($photo) {
            $image  = $photo->image();
        }

        return $image ?: false;
    }
}
