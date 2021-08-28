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

        //berkaitan dengan fungsi backend manajemen book
        Gate::define('index-permission', 'App\Policies\BookPolicy@index');
        Gate::define('delete-permission', 'App\Policies\BookPolicy@delete');
        
        //berkaitan dengan fungsi cart&order, untuk check apa betul yang login ini member
        Gate::define('checkmember', 'App\Policies\MemberPolicy@checkmember');
        Gate::define('cart-permission', 'App\Policies\CartPolicy@index');
    }
}
