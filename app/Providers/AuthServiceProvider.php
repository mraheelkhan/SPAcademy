<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->categories();
        $this->registerAdminmenuPolicies();
        //
    }
    //Categories
    public function categories(){
        
        Gate::define('category-index', function($user){
            return $user->hasAccess(['category-index']);
        });
        Gate::define('category-fetch', function($user){
            return $user->hasAccess(['category-fetch']);
        });
        Gate::define('category-store', function($user){
            return $user->hasAccess(['category-store']);
        });
        Gate::define('category-edit', function($user){
            return $user->hasAccess(['category-edit']);
        });
        Gate::define('category-show', function($user){
            return $user->hasAccess(['category-show']);
        });
        Gate::define('category-active', function($user){
            return $user->hasAccess(['category-active']);
        });
        Gate::define('category-disable', function($user){
            return $user->hasAccess(['category-disable']);
        });
    }
    //Admin Menu
    public function registerAdminmenuPolicies(){
    
        Gate::define('menu-index', function($user){
            return $user->hasAccess(['menu-index']);
        });

    }
}
