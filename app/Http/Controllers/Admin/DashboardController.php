<?php

namespace App\Http\Controllers\Admin;

use App\Register;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	protected $dashbord = [
		'page' => ['App\Page', 'book'],
		'slide' => ['App\Slide', 'picture'],
		'label' => ['App\Label', 'spell-check'],
		'review' => ['App\Review', 'bubble'],
		'social' => ['App\Social', 'link'],
		'admin' => ['App\User', 'user'],
	];

    public function index()
    {
        $data = [];
    	foreach ($this->dashbord as $name => $model) {
    		$page = new $model[0];
    		$_data = array(
    			'title' => title_case($name),
    			'route' => str_plural($name),
    			'icon' => $model[1],
    			'count' => $page->count()
    		);
    		
    		$data[] = (object) $_data;
    	}
    	return view('admin.dashboard', compact('data'));
    }

    public function phpinfo()
    {
    	phpinfo();
    }

}
