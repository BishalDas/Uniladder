<?php

namespace App;

use App\Base;

class Slide extends Base
{
	protected $attributes = [
		'status' => 1,
	];
	
	public function image($size = '450x300')
	{
		if($this->image){
			$image = public_path('uploads/slide/' . $this->image);
			if (file_exists($image)) {
				return asset('uploads/slide/' . $this->image);
			}else{				
				return 'holder.js/' . $size . '/image not found';
			}
		}else{			
			return 'holder.js/' . $size . '/image not found';
		}
	}
	
}
