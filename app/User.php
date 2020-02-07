<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','groups',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static $userRedirects = [
        100 => 'admin',
        50 => '/',
    ];

    public static function _redirect($group){
        return self::$userRedirects[$group];
    }

    public function getIsAdminAttribute()
    {
        return ($this->groups == 100);
    }
}
