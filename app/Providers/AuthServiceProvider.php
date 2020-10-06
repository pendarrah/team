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

        \Gate::define('user', function(){
            return \Auth::user()->type == 'user';
        });

        \Gate::define('supervisor', function(){
            return \Auth::user()->type == 'supervisor';
        });

        \Gate::define('admin', function(){
            return \Auth::user()->type == 'admin';
        });


    }
}
