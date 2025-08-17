<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('regular-user', function ($user) {
        return $user->hasRole('user') ;
            
    });
     Gate::define('writers', function ($user) {
        return $user->hasRole('writer')
        ||  $user->hasRole('senior_writer') ;
            
    });
     Gate::define('admins', function ($user) {
        return $user->hasRole('admin')
        || $user->hasRole('super_admin');
            
    });
    }
}
