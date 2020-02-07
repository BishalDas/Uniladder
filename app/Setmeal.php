<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setmeal extends Model
{
	protected $attributes = [
		'status' => 1,
		'price' => 0,
	];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function getCategoryTitleAttribute()
	{
		return $this->category ? $this->category->title : 'None';
	}

	public function getUrlAttribute()
	{
		return url('item/' . $this->slug);
	}
	public function getFPriceAttribute()
	{
		return number_format($this->price,2);
	}
}
