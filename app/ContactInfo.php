<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $atrributes=[
      'status'=> 0,
    ];

    protected $fillable=['name','address','email','phone'];
}
