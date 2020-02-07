<?php

Route::get('/', 'PageController@home')->name('_root_');


// routes for admin
Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login');
Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::post('admin/logout', 'Admin\LoginController@logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function(){
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/phpinfo', 'DashboardController@phpinfo');
    Route::resource('pages', 'PageController');
    Route::post('pages/order', 'PageController@order')->name('pages.order');
    Route::get('pages/showhide/{page}', 'PageController@showhide')->name('pages.showhide');
    Route::get('pages/deleteimage/{page}', 'PageController@deleteimage')->name('pages.deleteimage');
    Route::resource('slides', 'SlideController');
    Route::post('slides/order', 'SlideController@order')->name('slides.order');
    Route::get('slides/showhide/{slide}', 'SlideController@showhide')->name('slides.showhide');
    Route::resource('labels', 'LabelController');
    Route::resource('settings', 'SettingController');
    Route::resource('reviews', 'ReviewController');
    Route::get('reviews/approve/{review}', 'ReviewController@approve')->name('reviews.approve');
    Route::get('reviews/cancel/{review}', 'ReviewController@cancel')->name('reviews.cancel');
    Route::resource('galleries', 'GalleryController');
    Route::resource('socials', 'SocialController');
    Route::resource('admins', 'AdminController');
    Route::resource('registers', 'RegisterController');
    Route::resource('contactinfos', 'ContactInfoController');
    Route::resource('videos', 'VideoController');
    Route::resource('albums', 'AlbumController');
     Route::post('albums/photodelete', 'AlbumController@photodelete')->name('albums.photodelete');
});


Route::group(['middleware' => ['auth']], function(){
    Route::get('profile', 'UserController@profile')->name('profile');
});

Auth::routes();

$router = app()->make('router');
$pages = App\Page::all();
foreach ($pages as $page) {
    if($page->slug == 'contact-us'){
        $router->get($page->slug, 'PageController@contact')->name('contact'); 
        $router->post($page->slug, 'PageController@contact');  
    }elseif($page->slug == 'our-services'){
        $router->get($page->slug, 'PageController@services')->name('services');
    }elseif($page->slug == 'study-abroad'){
        $router->get($page->slug, 'PageController@studyabroad')->name('study.abroad');
    }elseif($page->slug == 'entrance-preparation'){
        $router->get($page->slug, 'PageController@entrancepreparation')->name('entrance.preparation');
    }elseif($page->slug == 'test-preparation'){
        $router->get($page->slug, 'PageController@testpreparation')->name('test.preparation');
    }elseif($page->slug == 'open-bank-account'){
        $router->get($page->slug, 'PageController@openbankaccount')->name('open.bankaccount');
    }elseif($page->slug == 'universities'){
        $router->get($page->slug, 'PageController@universities')->name('universities');
    }
     elseif($page->slug == 'videos'){
        $router->get($page->slug, 'PageController@galleryvideo')->name('video');
    }
    elseif($page->slug == 'photos'){
        $router->get($page->slug, 'PageController@photoAlbum')->name('photo');
    }elseif($page->slug <> '/'){
        $router->get($page->slug, 'PageController@index');
        $router->post($page->slug, 'PageController@index');
    }
   
}

Route::get('study-abroad/{slug}','PageController@studyplace')->name('study.place');
Route::post('inquiry', 'PageController@inquiry')->name('inquiry');
// Route::post('space_register', 'PageController@space_register')->name('space_register');
Route::get('captcha.jpg', 'CaptchaController@image')->name('captcha');
Route::get('thankyou', 'PageController@thankyou')->name('thankyou');

Route::get('writereviews','PageController@writereview')->name('writereview');
Route::post('writereviews','PageController@savereview')->name('savereview');
Route::get('thankyoureview', 'PageController@thankyoureview')->name('thankyoureview');
Route::get('photo-album/{id}', 'PageController@album')->name('viewalbum');

//Preview email on brower
Route::get('emailview/{id}', function($id) {
    $tablebook = \App\Order::find($id);
    return new \App\Mail\NewOrder($tablebook);
});
