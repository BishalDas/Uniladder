<?php

namespace App;

use App\Base; 

class Register extends Base
{

    public function getNameAttribute()
    {
        return $this->first_name . ' ' .$this->last_name;
    }
	
}
