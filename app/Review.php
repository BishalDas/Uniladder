<?php

namespace App;

use App\Base;

class Review extends Base
{
	protected $fillable = [
		'title','name','email','image','details',
	];
	protected $file_path = 'review';

	protected $attributes = [
	'status' => 0,
	];


	public function country()
	{
		return $this->belongsTo('\App\Country');
	}

	public function thumb($size = '300x300')
	{
		if($this->image){
			$image = public_path('uploads/review/' . $this->image);
			if (file_exists($image)) {
				return url('upload/review/' . $size . '/' . $this->image);
			}else{
				return 'holder.js/' . $size . '/image not found';
			}
		}else{
			return 'holder.js/' . $size . '/image not found';
		}
	}
}
