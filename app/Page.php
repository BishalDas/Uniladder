<?php

namespace App;

use App\Base; 

class Page extends Base
{
	protected $attributes = [
		'status' => 1,
	];

	protected $casts = [
		'position' => 'array',
	];

	public function parent()
	{
		return $this->belongsTo('App\Page', 'parent_id');
	}

	public function child()
	{
		return $this->hasMany('App\Page', 'parent_id')->active();
	}

	static function endsWith( $str, $sub = '?' ) {
		return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
	}
}
