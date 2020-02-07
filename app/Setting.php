<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	public function scopeOfValue($query, $title)
	{
		$setting = $query->where('title', $title)->first();
		return $setting ? ($setting->value ? $setting->value : '&nbsp;') : $title;
	}


	public static function getVId()
	{
		$setting = Setting::where('title','video')->first();
//		dd($setting);
		if($setting)
		{
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $setting->value, $match);
			$youtube_id = $match[1];
			return $youtube_id;
		}

	}
	public function getThumbAttribute()
	{
		return 'https://img.youtube.com/vi/' . $this->getVId() . '/hqdefault.jpg';
	}

	public function getVideoIdAtrribute()
	{
//		dd($this->vId());
		return $this->getVId();
	}


}
