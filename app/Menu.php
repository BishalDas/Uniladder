<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public static function main()
	{
		$i = 1;
		$menu = [];
		$pages = \App\Page::where('position', 'like',  '%2%')
		// ->where('id', '<>', 1)
		->orderby('menu_order')
		->active()
		->get();
		// dd($pages);
		foreach ($pages as $page) {
			
			$menu[$page->slug] = $page->title;
			$child = $page->child;
			if(count($child) > 0){
				$sub = [];
				foreach ($child as $c) {
					$sub['' . $c->slug] = $c->title;
				}
				$menu[$page->slug] = array('' . $page->slug => $page->title, 'sub' => $sub);
			}
			$i++;
		}
		return $menu;
	}

	public static function footer()
	{
		return Page::where('position', 'like',  '%3%')->orderBY('footer_order')->active()->get();		
	}
	
	public static function top()
	{
		return Page::where('position', 'like',  '%1%')->orderBY('footer_order')->active()->get();		
	}
}
