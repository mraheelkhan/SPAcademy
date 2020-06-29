<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
Use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('*', function($view)
        {
            $adminmenus=\App\Adminmenu::wherenull('parentid')->where('showinnav',1)->with('childrenformenu')->get();   
            $view->with('navs',$adminmenus);
        });
    }
}
