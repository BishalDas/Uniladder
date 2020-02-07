<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('main_menu', \App\Menu::main());
            $view->with('footer_menu', \App\Menu::footer());
            $view->with('top_menu', \App\Menu::top());
            $view->with('footer_services', \App\Page::where('parent_id', 8)->get());
            $view->with('socials', \App\Social::all());
            $view->with('contactinfos',\App\ContactInfo::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
